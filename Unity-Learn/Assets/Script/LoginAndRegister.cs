using UnityEngine;
using System.Collections;
using cn.bmob.api;
using cn.bmob.io;
using System.Collections.Generic;
using System;

public class LoginAndRegister : MonoBehaviour {

    static String TABLENAME = "UserInfo";

	public GameObject LoginUI;
    public GameObject RegisterUI;

	//登录
	public UIButton Login_BtnLogin;
	public UIButton Login_BtnRegister;
	public UILabel Login_UserName;
	public UIInput Login_Password;
	//注册
	public UIButton Register_BtnBack;
	public UIButton Register_BtnRegister;
	public UIInput Register_UserName;
	public UIInput Register_Password;
	public UIInput Register_VerifyPassword;

    //忘记密码
    public UIButton Btn_ForgetPassword;
    public UIInput Email;
	// Use this for initialization
	void Start () {

        //BmobWindows bmobWindows = new BmobWindows();
        //bmobWindows.Timestamp((resp, exception) =>
        //{
        //    if (exception != null)
        //    {
        //        print("请求失败, 失败原因为： " + exception.Message);
        //        return;
        //    }
        //    //返回服务器时间（单位：秒）
        //    print("返回时间戳为： " + resp.timestamp);
        //    print("返回格式化的日期为： " + resp.datetime);
        //}
        //);

        var data = new UserInfo();


        LoginUI.SetActive(true);
        RegisterUI.SetActive(false);


        EventDelegate.Add(Btn_ForgetPassword.onClick, delegate
        {
            string email = Email.value.ToString();
            forgetPassword(email);
        });
        //按下登录按钮
        EventDelegate.Add(Login_BtnLogin.onClick, delegate
        {
           string name = Login_UserName.text.ToString();
           string password = Login_Password.value.ToString();
           LoginInspact(name,password);
        });

		//按下登录页面注册
		EventDelegate.Add (Login_BtnRegister.onClick, delegate {
			LoginUI.SetActive (false);
			RegisterUI.SetActive (true);
		});

		//按下返回键
		EventDelegate.Add (Register_BtnBack.onClick, delegate {
			LoginUI.SetActive (true);
			RegisterUI.SetActive (false);
		});

		//按下注册页面注册键
		EventDelegate.Add (Register_BtnRegister.onClick, delegate {
            if (Register_UserName.value.Length < 6 || Register_Password.value.Length < 8)
            {
                Debug.Log("用户名必须大于6位，密码必须大于八位");
            }
            else if (Register_Password.value != Register_VerifyPassword.value)
            {
                NGUIDebug.Log("密码和确认密码不一致");
            }
            else
            {
                string username = Register_UserName.value.ToString();
                string password = Register_Password.value.ToString();
                Insert(username,password);
                Login_UserName.text = Register_UserName.value;
                Login_Password.value = Register_Password.value;
                LoginUI.SetActive(true);
                RegisterUI.SetActive(false);
            }

		});

	}
    void Insert(string username,string password)
    {
        BmobQuery query = new BmobQuery();
        query.WhereEqualTo("UserName",username);
        HelloBomb.Bmob.Find<UserInfo>(TABLENAME, query, (resp, exception) =>
        {
            if (exception != null)
            {
                print("查询失败, 失败原因为： " + exception.Message);
            }
            else
            {
                List<UserInfo> list = resp.results;
                if (list.Count == 0)
                {
                    print("可以注册");
                    charu();
                }

                else
                {
                    print("用户名已存在");
                }
            }
        });
    }

    void charu()
    {
                    var data = new UserInfo();
                    data.UserName = Register_UserName.value;
                    data.Password = Register_Password.value;

                    HelloBomb.Bmob.Create(TABLENAME, data,
                     (resp, exception) =>
                     {
                         if (exception != null)
                         {
                             print("保存失败, 失败原因为： " + exception.Message);
                             return;
                         }

                         print("保存成功, @" + resp.createdAt);
                     });
    }

    void LoginInspact(string username,string password)
    {
        BmobQuery query = new BmobQuery();
        query.WhereEqualTo("UserName",username);
        HelloBomb.Bmob.Find<UserInfo>(TABLENAME, query, (resp, exception) =>
        {
            if (exception != null)
            {
                print("查询失败, 失败原因为： " + exception.Message);
            }
            else
            {
                List<UserInfo> list = resp.results;
                if (list.Count == 0)
                {
                    print("没有找到该用户");
                }
                else
                {
                    foreach (var game in list)
                    {
                        print("获取的对象为： " + game.ToString());
                        if (game.Password == password)
                        {
                            print("登录成功");
                        }
                        else print("登录失败");
                    }
                }
            }
        });
    }

    void forgetPassword(string email)
    {
        HelloBomb.Bmob.Reset(email, (resp, exception) =>
        {
            if (exception != null)
            {
                print("重置密码请求失败, 失败原因为： " + exception.Message);
                return;
            }

            print("重置密码请求发送成功！");
        });
    }
}
