using UnityEngine;
using System.Collections;

public class UpdateManager : MonoBehaviour {

    public UIButton update;
    public UIButton download;

    public UIInput show;

    void Start()
    {
        EventDelegate.Add(update.onClick, delegate
        {
            HelloBomb.Bmob.FileUpload("C:/Users/Administrator/Desktop/新建文本文档.txt", (resp, exception) =>
            {
                if (exception != null)
                {
                    print("上传失败, 失败原因为： " + exception.Message);
                    return;
                }
                print("上传成功，返回数据： " + resp.ToString());
            });
        });

        EventDelegate.Add(download.onClick, delegate
        {

        });
    }
}
