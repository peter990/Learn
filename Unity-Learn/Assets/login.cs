using UnityEngine;
using System.Collections;

public class php : MonoBehaviour
{

    public GameObject LoginUI;
    public GameObject RegisterUI;

    public UIInput username;
    public UIInput password;

    public UIButton login;
    public UIButton register;

    void Start()
    {
        string _name = username.value;
        string _password = password.value;

        EventDelegate.Add(login.onClick, delegate
        {
            StartCoroutine(loginPHP(_name, _password));
        });

        EventDelegate.Add(register.onClick, delegate
        {
            StartCoroutine(registerPHP(_name, _password));
        });
    }

    IEnumerator loginPHP(string username, string password)
    {
        PostStream poststream = new PostStream();

        poststream.BeginWrite(true);
        poststream.Write("username", username);
        poststream.Write("score", password);
        poststream.EndWrite();
        WWW www = new WWW("bxu2442650496.my3w.com/php/register.php", poststream.BYTES);
        yield return www;
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

    IEnumerator registerPHP(string username, string password)
    {
        PostStream poststream = new PostStream();
        poststream.BeginWrite(true);
        poststream.Write("username", username);
        poststream.Write("score", password);
        poststream.EndWrite();
        WWW www = new WWW("bxu2442650496.my3w.com/php/register.php", poststream.BYTES);
        yield return www;
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
