(function(ed,url){	tinymce.create('tinymce.plugins.imagemanager', {		init:function(ed,url)		{			ed.addCommand('mceImagemanager',function(){				$('#filebrowsermodal').off('files-selected').on('files-selected', function(ev, files){					for(var i=0;i<files.length;i++)					{						var path = files[i].path();						var img = '<img src="'+path+'" />';						ed.execCommand('mceInsertContent', false, img);					}				}).modal('show');			});			ed.addButton('imagemanager',{				title:'Indsæt billede',				cmd:'mceImagemanager',				image : url + '/img.gif'			});			ed.onNodeChange.add(function(ed,cm,n){				cm.setActive('imagemanager',n.nodeName == 'IMG');			});		},		createControl:function(n,cm){			return null;		},		getInfo:function(){			return {				longname : 'Imagemanager',				author : 'Danwebs',				authorurl : 'http://danwebs.dk',				infourl : 'http://danwebs.dk',				version : tinymce.majorVersion + "." + tinymce.minorVersion			};		}	});	tinymce.PluginManager.add('imagemanager',tinymce.plugins.imagemanager);})();