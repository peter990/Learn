using UnityEngine;
using System.Collections;

public class AddItem : MonoBehaviour {
	private UIGrid grid;
	public GameObject m_objSelfItem;
	public UIScrollView scrollView;

	Vector3 c;

	void Start()
	{
		grid = GetComponentInChildren<UIGrid> ();
		AddDataToUI ();
	}

	void FixedUpdate()
	{

		c = scrollView.panel.CalculateConstrainOffset (scrollView.bounds.min, scrollView.bounds.min);
		if (c.y < 1.0f) 
		{
			ShowUI ();
		}
	}

	void ShowUI()
	{
		AddDataToUI ();
	}

	void AddDataToUI()
	{
		int nCurCount = grid.transform.childCount;
		for (int i = 0; i < 10; i++) {  
			GameObject go = Instantiate (m_objSelfItem) as GameObject;
			go.transform.parent = grid.transform;
			go.transform.localScale = Vector3.one;
			go.SetActive (true);
			int nTemp = nCurCount + i;
			go.name = "Item" + nTemp.ToString ();
		}
	}
}
