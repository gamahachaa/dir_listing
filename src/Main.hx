package;

import haxe.Json;
import haxe.io.Path;
import php.Lib;
import php.SuperGlobal;
import sys.FileSystem;
import dir.Params;
import dir.Results;
using StringTools;
using Lambda;

/**
 * ...
 * @author bb
 */
class Main
{

	static function main()
	{
		var params = Lib.hashOfAssociativeArray(SuperGlobal._REQUEST);
		var result:Map<String,Dynamic> = [];
		result.set(Results.DIRECTORY, []);
		result.set(Results.STATUS, Results.SUCCESS_VALUE);
		//trace(FileSystem.stat("./"));
		//trace(params);
		try
		{
			if (params.exists(Params.DIRECTORY))
			{
				var dir:String = decodeDir(params.get(Params.DIRECTORY));
				//dir = dir.urlDecode();
				//var list = FileSystem.readDirectory(dir);
				var list = fetchlist(dir).filter((e)->(FileSystem.isDirectory(dir + "/" +e)));
				if (params.exists(Params.FULL_PATH))
					list = list.map((e)->(Path.addTrailingSlash( dir ) + e));
				
				result.set(Results.DIRECTORY, list);
			}
			else if (params.exists(Params.DIRECTORY_WITH_QUIZ))
			{
				var dir:String = decodeDir(params.get(Params.DIRECTORY_WITH_QUIZ));
				var list = fetchlist(params.get(Params.DIRECTORY_WITH_QUIZ)).filter((e)->(FileSystem.isDirectory(dir + "/" +e + "/quiz")));
				if (params.exists(Params.FULL_PATH))
					list = list = list.map((e)->(Path.addTrailingSlash( dir ) + e));
				result.set(Results.DIRECTORY, list);
			}
			else
			{
				result.set(Results.STATUS, Results.FAILED_VALUE);
				result.set(Results.MESSAGE, "dir not set");
			}
			if (params.exists("test"))
			{
				result.set(Results.STATUS, "tested");
			}
		}
		catch (e)
		{
			result.set(Results.STATUS, Results.FAILED_VALUE);
			result.set(Results.MESSAGE, e.message);
		}
		Lib.print(Json.stringify(result));
	}
	static inline function decodeDir(param:String){
		return Std.string(param).urlDecode();
	}
	static function fetchlist(dir:String)
	{
		 //var dir:String = Std.string(dir);
				//dir = dir.urlDecode();
		return FileSystem.readDirectory(Std.string(dir).urlDecode());
	}
	static function hasQuizList(list:Array<String>, dir:String)
	{
		return list.filter((e)->(FileSystem.isDirectory(dir + "/" +e + "/quiz")));
	}

}