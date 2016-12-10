using UnityEngine;
using System.Collections;

public class WebManager : MonoBehaviour {
    public Texture2D m_uploadImage;

    protected Texture2D m_downloadTexture;

    string m_info = "Nothing";
    void OnGUI()
    {
        GUI.BeginGroup(new Rect(Screen.width*0.5f -100,Screen.height*0.5f -100,1500,800),"");
        GUI.Label(new Rect(10, 10, 400, 30), m_info);

        if(GUI.Button(new Rect(10,50,150,30),"Get Date"))
        {}
        if (GUI.Button(new Rect(10, 100, 150, 30), "Post Data"))
        { }
        if (m_downloadTexture != null)
        {
            GUI.DrawTexture(new Rect(00,00, 300, 300), m_downloadTexture);
        }
            if (GUI.Button(new Rect(10, 150, 150, 30), "Request Image"))
            {
                StartCoroutine(IRequestPNG());
            }
        
        GUI.EndGroup();
    }

    IEnumerator IRequestPNG()
    {
        byte[] bs = m_uploadImage.EncodeToJPG();

        WWWForm form = new WWWForm();

        form.AddBinaryData("picture",bs,"screenshot","image/png");

        WWW www = new WWW("bxu2442650496.my3w.com/php/downloadImage.php",form);

        yield return www;

        print(www.text.ToString());

        if (www.error != null)
        {
            m_info = www.error;
            yield return null;
        }

        m_downloadTexture = www.texture;
    }
}
