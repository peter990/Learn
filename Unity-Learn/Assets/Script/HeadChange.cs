using UnityEngine;
using System.Collections;

public class HeadChange : MonoBehaviour {
	public UISprite head_Sprite;
	public UIButton head1;
	public UISprite head1_Sprite;
	public UIButton head2;
	public UISprite head2_Sprite;
	public UIButton head3;
	public UISprite head3_Sprite;

	void Start()
	{
		EventDelegate.Add (head1.onClick, delegate {
			head_Sprite.spriteName= head1_Sprite.spriteName;
			print("head_Sprite = head1_Sprite;");
		});
		EventDelegate.Add (head2.onClick, delegate {
			head_Sprite.spriteName = head2_Sprite.spriteName;
			print("head_Sprite = head2_Sprite;");
		});
		EventDelegate.Add (head3.onClick, delegate {
			head_Sprite.spriteName = head3_Sprite.spriteName;
			print("head_Sprite = head3_Sprite;");
		});
	}
}
