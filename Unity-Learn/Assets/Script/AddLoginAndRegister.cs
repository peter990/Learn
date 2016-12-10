using UnityEngine;
using System.Collections;

public class AddLoginAndRegister : MonoBehaviour {

	public GameObject prefab;


	// Use this for initialization
	void Start () {
//		Object prefab = UnityEditor.AssetDatabase.LoadAssetAtPath("Assets/Prefab/LoginAndRegister.prefab", typeof(GameObject));
		GameObject cube = (GameObject)Instantiate(prefab);
		cube.transform.parent = this.transform;
		cube.transform.localScale = Vector3.one;
	}

}
