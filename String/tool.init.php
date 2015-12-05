<?php
namespace Common\Nb\Util;

/**
 * @category    Nb
 * @package     Util
 * @author      李贵兵 <liguibing@nbfanyi.com>
 * @version     2015/07/31 18:42:21
 * @copyright   Copyright (c) 2015 nbangfanyi.com, Inc. All Rights Reserved.
 **/

/**
 * Tool主要为一些工具函数的集合
 */
class toolInit {

    /**
     * BdsToken第二个参数的Key
     *
     * 随机字符串，不要泄露，必要时可以更改。
     */
    const NBSTOKEN_KEY = 'NB+^lDuWor)Owk~XQp1ZtbNk11ozWIGP';

    /**
     * MySQL转义
     *
     * @author  李贵兵<liguibing@nbfanyi.com>
     * @version 2015/07/31 18:42:21
     * @param   string  $strString          要转义的字符
     * @return  string                      转义后的字符
     */
    public static function escapeString($strString) {
        return mysql_real_escape_string($strString);
    }
    
    /**
     * http请求跳转的工具方法
     * 
     * @author  李贵兵<liguibing@nbfanyi.com>
     * @version 2015/07/31 18:42:21
     * @param  string  $strUrl    跳转的url
     * @param  integer $intStatus 跳转的http code，默认302跳转
     * @param  boolean $bolExit   是否exit推出，是的话不打印notice日志
     * @return true
     */
    public static function redirect($strUrl, $intStatus = 302, $bolExit = true) {
        switch($intStatus) {
            //服务器返回状态码
            case 200:
                echo "<meta http-equiv='Pragma' content='no-cache'>".
                     "<meta http-equiv='Refresh' content='0;URL=".$strUrl."'>";
                break;
            case 301:
                header('HTTP/1.1 301 Moved Permanently');
            case 302:
                header('Location: '.$strUrl);
                break;
            case 404:
                header('HTTP/1.1 404 Not Found');
                break;
            default:
                header('Location: '.$strUrl);
        }
        if($bolExit) {
            exit(0);
        }
        return true;
    }
    
    /**
     * 对字符串做简单hash的函数
     * 
     * @author  李贵兵<liguibing@nbfanyi.com>
     * @version 2015/07/31 18:42:21
     * @param  string $str 输入的字符串
     * @return integer 空字符串返回0，否则返回其hash值
     */
    public static function strHash($str) {
        if (empty($str)) return 0;
        $md5 = md5($str);
        //some memorable dates, for Gris and me.
        return intval(base_convert("{$md5[6]}{$md5[24]}{$md5[7]}{$md5[16]}{$md5[3]}{$md5[15]}{$md5[13]}{$md5[8]}", 16, 10));
    }

    /**
     * 将IP按照主机字节序排列
     * 
     * @author  李贵兵<liguibing@nbfanyi.com>
     * @version 2015/07/31 18:42:21
     * @param  string $ip 网络字节序，字符串格式的IP地址，例如'1.0.0.127'
     * @return integer 返回主机字节序的整型IP地址
     */
    public static function ip2ri($ip) {
        $n = sprintf("%u", ip2long($ip));
        $n = (($n & 0xFF) << 24) | ((($n >> 8) & 0xFF) << 16) | ((($n >> 16) & 0xFF) << 8) | (($n >> 24) & 0xFF);
        return $n;
    }

    /**
     * 计算当前用户BdsToken
     *
     * BdsToken用于防止CSRF攻击。关于CSRF的原理请参考{@link http://baike.baidu.com/item/CSRF}。
     *
     * 具体原理是：在页面模板/读取接口通过此方法计算出Token并发出；页面在通过GET/POST方法提交/调用API接口时，带上此Token；提交接口通过{@link checkBdsToken()}方法判断Token是否有效，从而决定是否进一步处理请求。
     *
     * BdsToken的实质是通过用户Cookie中的BDUSS（登录用户）或NBIDUID（未登录用户）、产品线加密串、附加串一起计算得到的MD5。
     * 
     * @author  李贵兵<liguibing@nbfanyi.com>
     * @version 2015/07/31 18:42:21
     * @param   string  $strSrcEx   附加串（MD5串3），默认为null，实际使用时不建议留空。如果只在模块内部使用，可以以模块名等作为附加串；如果页面和接口是跨模块的，两边需要采用一致的附加串。
     * @return  string
     */
    public static function getNbsToken($strSrcEx = null) {
        // MD5串1（NBUSS或NBFYUID）
        $strSrc = '';
        if (isset($_COOKIE['NBUSS'])) {
            $strSrc = $_COOKIE['NBUSS'];
        } elseif (isset($_COOKIE['NBFYID'])) {
            $strSrc = $_COOKIE['NBFYUID'];
        }

        // MD5串2（产品线加密串）
        $strKey = self::NBSTOKEN_KEY;

        // 计算BdsToken
        $strToken  = '';
        $bolResult = md5($strSrc.$strKey.$strSrcEx.$strToken);
        if ($bolResult === false) {
            return false;
        }

        return $strToken;
    }

    /**
     * 检查当前用户传入的BdsToken
     *
     * 配合{@link getNbsToken()}使用。
     *
     * @author  李贵兵<liguibing@nbfanyi.com>
     * @version 2015/07/31 18:42:21
     * @param   string  $strToken           要检查的BdsToken
     * @param   string  $strSrcEx           附加串（MD5串3）；要与计算BdsToken时传入的一致
     * @return  bool                        检查成功返回true；检查失败返回false
     */
    public static function checkNbsToken($strToken, $strSrcEx = null) {
        // MD5串1（NBUSS或NBFYID）
        $strSrc = '';
        if (isset($_COOKIE['NBUSS'])) {
            $strSrc = $_COOKIE['NBUSS'];
        } elseif (isset($_COOKIE['NBFYID'])) {
            $strSrc = $_COOKIE['NBFYUID'];
        }

        // MD5串2（产品线加密串）
        $strKey = self::NBSTOKEN_KEY;

        // 计算BdsToken
        $bolResult = md5($strSrc.$strKey.$strSrcEx.$strToken);
        if ($bolResult !== true) {
            return false;
        }

        return true;
    }
    
    /**
     * 检查参数合法性
     *
     * 此检查方法具有中断特性，即在检查过程中如果发现一处不合法的参数，就会返回false并退出。
     *
     * @author      李贵兵<liguibing@nbfanyi.com>
     * @version     2015/07/31 17:31:18
     * @param   array   $arrParams          参数数组，Key-Value形式。Key为参数名，Value为array；其中array的第一项为参数变量，第二项为一个bool表达式，为true时表示参数合法，为false时表示参数不合法。形如：
     * <code>
     * array(
     *     'uid'    =>  array($intUid,  is_numeric($intUid) && $intUid > 0),
     *     'info'   =>  array($arrInfo, is_array($arrInfo)),
     * )
     * </code>
     * 
     * @return  bool                        是否合法；合法返回true，不合法返回false
     */
    public static function checkParams($arrParams) {
        $intParamCount = 0;
        foreach ($arrParams as $strName => $arrValues) {
            ++$intParamCount;
            if (empty($arrValues)) {
                continue;
            }
            $mixValue = $arrValues[0];
            $bolValid = $arrValues[1];
            if (!$bolValid) {
                // 获取调用者信息
                $arrBacktrace = debug_backtrace();
                $strBacktrace = "";
                if (!empty($arrBacktrace) && isset($arrBacktrace[1])) {
                    $strBacktrace = sprintf("%s() at %s:%d", $arrBacktrace[1]['function'], $arrBacktrace[1]['file'], $arrBacktrace[1]['line']);
                }
                
                // 出错处理
                error_log('Warning:[Invalid parameter ' . $intParamCount . ': ' . $strName . '], Value:[' . $strName . ': ' . var_export($mixValue, true) . '] Trace:[' . $strBacktrace . ']');
                
                return false;
            }
        }
    
        return true;
    }
    
    /**
     * 记录错误日志，直接写入系统错误日志文件，后期改进
     * 
     * @param string $msg  要记录的错误信息
     * @return bool
     */
    public static function writeErrorLog($msg = ''){
        if (empty($msg)){
            return false;
        }
        error_log($msg);
        
        return true;
    }
    
}
