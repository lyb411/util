<?php 
if (!defined('IS_INITPHP')) exit('Access Denied!');
/*********************************************************************************
* 扩展类库-通用的邮件发送类
*-------------------------------------------------------------------------------
* $Author:liguibing 
* $Dtime:2015-10-02
***********************************************************************************/

class phpMailInit{
    private $config;
    private $data;
    
    //默认值
    public function __construct(){
        $this->config = array(
            'host'        =>    'smtp.mxhichina.com',
            'userName'    =>    'nbfy@nbfanyi.com',
            'passWowd'    =>    'Unbounded12!@',
            'from'        =>    'nbfy@nbfanyi.com',
        );
        
        $this->data = array();
    }
    
    /**
     * 通用发送邮件
     * 
     * @param array $data 必须
     * @param array $config 可选
     * 
     * 格式：
     *
     //stmp服务器配置
     $config = array(
         'host'        =>    'smtp.mxhichina.com',
         'userName'    =>    'nbfy@nbfanyi.com',//这儿要写完整的地址，否则有些情况下无法发送
         'passWowd'    =>    'Unbounded12!@',
         'from'        =>    'nbfy@nbfanyi.com',
     );
      
     //发送配置
     $data = array(
         'fromName'          =>     'N邦翻译',//昵称，邮件地址栏显示的
         'addAddress'        =>      array(//收件人
             array('email'=>'565996119@qq.com','title'=>'收件人姓名'),
             array('email'=>'lyb411@126.com','title'=>'收件人姓名'),
         ),
         'addAttachment'     =>      array(//附件
             array('path'=>'/home/liguibing/code/memcached.php','title'=>'memcached使用demo.php'),
             array('path'=>'/home/liguibing/code/test.sh','title'=>'shell脚本.sh'),
             array('path'=>'/home/liguibing/code/111.jpg','title'=>'这是图片.jpg'),
         ),
         'subject'            =>        '邮件标题',//标题
         'body'               =>        '邮件内容',//邮件内容
         'altbody'            =>        'N邦翻译电商平台',//收件地址中的昵称      
     );
     
     *
     *@return int  1-发送成功，0-发送失败
     */
    public function send($data=array(),$config=array()){
        if (empty($data)){
            return 0;
        }
        
        if (empty($config)){
            $config = $this->config;
        }
        
        return self::_sendMail($config,$data);
    }
    
    public static function _sendMail($config=array(),$data=array())
    {
        $cls = dirname(__FILE__).'/PHPMailer/class.phpmailer.php';
        require_once $cls;
        $mail = new PHPMailer();
    
        $mail->CharSet ="UTF-8";
        $mail->IsSMTP();// Set mailer to use SMTP
        $mail->Host = $config['host'];//SMTP服务器
        $mail->SMTPAuth = true;//使SMTP认证
        $mail->Username = $config['userName'];//SMTP username 用户名,发送人邮件名称
        $mail->Password = $config['passWowd'];// SMTP password  密码
        $mail->From     = $config['from'];//发送人完整邮件地址
        $mail->SMTPSecure = 'tls';//启用加密,还接受了ssl
    
        //昵称，邮件地址栏显示的
        $mail->FromName = $data['fromName'];
    
        //添加联系人，可以是多个
        if( isset($data['addAddress']) && count($data['addAddress']) > 0 ){
            foreach ($data['addAddress'] as $v){
                $mail->AddAddress($v['email'],$v['title']);
            }
        }
    
        //添加附件
        if( isset($data['addAttachment']) && count($data['addAttachment']) > 0 ){
            foreach ($data['addAttachment'] as $v){
                $mail->addAttachment($v['path'],$v['title']);
            }
        }
        
        $mail->WordWrap = 50;//自动换行设置为50个字符
        $mail->IsHTML(true); //设置电子邮件格式为：HTML
         
        //邮件内容
        $mail->Subject = $data['subject'];
        $mail->Body    = $data['body'];
        $mail->AltBody = $data['altbody'];
        
        $r = $mail->Send();
        
        return (int)$r;
    }    
}