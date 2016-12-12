using UnityEngine;
using System.Collections;

public class TestofSelectAndInsert : MonoBehaviour {

    public UIInput username;
    public UIInput password;

    public UIButton btn_login;
    public UIButton btn_register;

	// Use this for initialization
    void Start()
    {
        string m_username ="";
        string m_password = "";
        EventDelegate.Add(btn_login.onClick, delegate
        {
            m_username = username.value;
            m_password = password.value;
            StartCoroutine(login(m_username, m_password));
        });

        EventDelegate.Add(btn_register.onClick, delegate
        {
            m_username = username.value;
            m_password = password.value;
            StartCoroutine(register(m_username, m_password));
        });
    }

    IEnumerator login(string username, string password)
    {
        PostStream poststream = new PostStream();

        poststream.BeginWrite(true);
        poststream.Write("username", username);
        poststream.Write("password", password);
        poststream.EndWrite();
        WWW www = new WWW("bxu2442650496.my3w.com/php/login.php", poststream.BYTES);
        yield return www;
        print(www.text);
        if (www.error != null)
        {
            Debug.LogError(www.error);
        }
        else
        {
            if (www.text.Equals("True"))
            {
                print("登录成功");
            }
            else print("登录失败");
        }
    }

    IEnumerator register(string username, string password)
    {
        PostStream poststream = new PostStream();
        poststream.BeginWrite(true);
        poststream.Write("username", username);
        poststream.Write("password", password);
        poststream.EndWrite();
        WWW www = new WWW("bxu2442650496.my3w.com/php/register.php", poststream.BYTES);
        yield return www;
        print(www.text);
        if (www.error != null)
        {
            Debug.LogError(www.error);
        }
        else
        {
            if (www.text.Equals("True"))
            {
                print("注册成功");
            }
            else print("注册失败");
        }
    }
}
