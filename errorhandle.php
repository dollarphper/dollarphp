<?php
/**
 * @desc：错误显示类
 */
namespace dollarphp;
class errorhandle{
    /*
     构造方法：
     */
    public function __construct(){
        $this->error_handle();
        $this->exception_handle();
    }
    /*
     内部方法：错误处理
     */
    private function error_handle(){
        set_error_handler(function($l,$m,$f,$li,$c){
            if($l<8){
                $arr = array(
                        "error_level"=>$l,
                        "error_msg"=>$m,
                        "error_file"=>$f,
                        "error_line"=>$l
                    );
                echo "<pre>";
                var_dump($arr);
                echo "</pre>";
                exit;
            }
        });
    }
    /*
     内部方法：异常处理
     */
    private function exception_handle(){
        set_exception_handler(function($e){
            $msg = $e->getMessage();
            $file = $e->getFile();
            $line = $e->getLine();
            $arr = array(
                    'exception_msg'=>$msg,
                    'exception_file'=>$file,
                    'exception_line'=>$line
                );
            echo "<pre>";
            var_dump($arr);
            echo "</pre>";
            exit;
        });
    }
}