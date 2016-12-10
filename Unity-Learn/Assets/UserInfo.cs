using cn.bmob.json;
using cn.bmob.response;
using cn.bmob.Extensions;
using cn.bmob.io;
using System;

public class UserInfo : BmobTable {

    public BmobFile File { get; set; }

    /// 文件组名
    public string group { get; set; }
        /// 相对于Bmob文件服务器的位置
    public string url { get; set; }
    /// 文件请求的地址

    public String UserName { get; set; }

    public String Password { get; set; }

    public override void readFields(BmobInput input)
    {
        base.readFields(input);

        this.File = input.Get<BmobFile>("file");

        this.group = input.getString("group");

        this.url = input.getString("url");

        this.UserName = input.getString("UserName");

        this.Password = input.getString("Password");
    }

    public override void write(BmobOutput output, bool all)
    {
        base.write(output, all);

        output.Put("file", this.File);

        output.Put("UserName",this.UserName);

        output.Put("Password",this.Password);
    }

}
