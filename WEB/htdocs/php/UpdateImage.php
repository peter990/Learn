<?php
   $uploaddir = "./files/";//�����ļ�����Ŀ¼ ע�����/  
   $type=array("jpg","gif","bmp","jpeg","png");//���������ϴ��ļ�������
   $patch="http://localhost/win_mojavi2/htdocs/files/";//��������·��
//   $patch="http://127.0.0.1/cr_downloadphp/upload/files/";//��������·��
  
   //��ȡ�ļ���׺������
      function fileext($filename)
    {
        return substr(strrchr($filename, '.'), 1);
    }
   //��������ļ�������  
    function random($length)
    {
        $hash = 'CR-';
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $max = strlen($chars) - 1;
        mt_srand((double)microtime() * 1000000);
            for($i = 0; $i < $length; $i++)
            {
                $hash .= $chars[mt_rand(0, $max)];
            }  return $hash;
    }
   $a=strtolower(fileext($_FILES['file']['name']));
   //�ж��ļ�����
   if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type))
     {
        $text=implode(",",$type);
        echo "��ֻ���ϴ����������ļ�: ",$text,"<br>";
     }
   //����Ŀ���ļ����ļ���  
   else{
    $filename=explode(".",$_FILES['file']['name']);
        do
        {
            $filename[0]=random(10); //�������������
            $name=implode(".",$filename);
            //$name1=$name.".Mcncc";
            $uploadfile=$uploaddir.$name;
        }
   while(file_exists($uploadfile));
   if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)){
           
            if(is_uploaded_file($_FILES['file']['tmp_name']){
                //���ͼƬԤ��
                echo "�����ļ��Ѿ��ϴ���� �ϴ�ͼƬԤ��:<img src='$uploadfile'>";
              }
              else{
                echo "�ϴ�ʧ�ܣ�";
              }
        }
   }
?>