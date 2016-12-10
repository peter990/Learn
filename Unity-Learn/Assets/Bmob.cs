using UnityEngine;
using System.Collections;
using cn.bmob.api;
using cn.bmob.tools;

public class Bmobunity : MonoBehaviour {

    private static BmobUnity Bmob;

    // Use this for initialization
    void Start()
    {
        BmobDebug.Register(print);
       // BmobDebug.level = BmobDebug.Level.TRACE;
        Bmob = gameObject.GetComponent<BmobUnity>();
    }
}
