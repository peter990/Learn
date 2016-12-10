using UnityEngine;
using System.Collections;
using cn.bmob.api;
using cn.bmob.tools;

public class HelloBomb : MonoBehaviour {

    public static BmobUnity Bmob;

    // Use this for initialization
    void Start()
    {
        // Bmob.initialize("4414150cb439afdf684d37dc184e0f9f", "e1deb317442129c125b228ddf78e5f22");
        BmobDebug.Register(print);
        BmobDebug.level = BmobDebug.Level.TRACE;
        Bmob = gameObject.GetComponent<BmobUnity>();
    }

    // Update is called once per frame
    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Escape))
        {
            Application.Quit();
        }
    }
}
