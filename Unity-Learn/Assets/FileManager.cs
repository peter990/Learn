using UnityEngine;
using System.Collections;
using cn.bmob.io;
using System;
using System.Collections.Generic;
using System.IO;

public class FileManager : MonoBehaviour {
    public UIButton Update;
    public UIButton Download;
    public UIInput show;

    static String TABLENAME = "UserInfo";

    void Start()
    {
        EventDelegate.Add(Update.onClick, delegate
        {
            AddFile();
        });

        EventDelegate.Add(Download.onClick, delegate 
        {
            DownloadFile();
        });
    }



    void AddFile()
    {
        HelloBomb.Bmob.FileUpload("C:/Users/Administrator/Desktop/Book1.csv", (resp, exception) =>
        {
            if (exception != null)
            {
                print("上传失败, 失败原因为： " + exception.Message);
                return;
            }
            print("上传成功，返回数据： " + resp.ToString());
        });
    }

    void DownloadFile()
    {

    }
   

}
