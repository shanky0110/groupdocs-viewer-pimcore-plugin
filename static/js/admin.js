pimcore.registerNS("pimcore.plugin.GroupDocsViewer");

pimcore.plugin.GroupDocsViewer = Class.create(pimcore.plugin.admin, {
	getClassName : function() {
		return "pimcore.plugin.GroupDocsViewer";
	},

	initialize : function() {
		pimcore.plugin.broker.registerPlugin(this);
	},

	pimcoreReady : function(params, broker) {
		// add a sub-menu item under "Extras" in the main menu
		var toolbar = Ext.getCmp("pimcore_panel_toolbar");

		var action = new Ext.Action({
					id : "groupdocs_viewer_plugin_menu_item",
					text : "Configure GroupDocs Viewer",
					iconCls : "fraud_check_menu_icon",
					handler : this.showTab
				});

		toolbar.items.items[1].menu.add(action);
	},

	showTab : function() {
		Ext.Ajax.request({
					url : '/plugin/GroupDocsViewer/admin/configdata',
					success : function(response, options) {
						var objAjax = Ext.decode(response.responseText);
						groupDocsViewer.dataLoaded(objAjax);
					},
					failure : function(response, options) {
						Ext.MessageBox.show({
									title : 'GroupDocs Plugin Error',
									msg : 'GroupDocs Plugin Error - can\'t load data!',
									buttons : Ext.MessageBox.OK,
									animateTarget : 'mb9',
									icon : Ext.MessageBox.ERROR
								});
					}
				});

	},
	dataLoaded : function(objAjax) {
//		alert(objAjax);
		// File id
		groupDocsViewer.fileid = new Ext.form.TextField({
			value: objAjax.configs.fileid,
			width: 250,
			style: 'margin: 3px;'
		});
        // frame border width
        groupDocsViewer.frameborder = new Ext.form.NumberField({
            value: objAjax.configs.frameborder,
            width: 250,
            style: 'margin: 3px;'
        });
        // frame width
        groupDocsViewer.width = new Ext.form.NumberField({
            value: objAjax.configs.width,
            width: 250,
            style: 'margin: 3px;'
        });
        // frame height
        groupDocsViewer.height = new Ext.form.NumberField({
            value: objAjax.configs.height,
            width: 250,
            style: 'margin: 3px;'
        });
		groupDocsViewer.panel = new Ext.Panel({
					id : "groupdocs_viewer_plugin_tab_panel",
					title : "Configure GroupDocs Viewer",
					iconCls : "groupdocs_viewer_plugin_tab_icon",
					border : false,
					layout : {
						type: 'table',
						columns: 2
					},
					closable : true,
					items : [
						{
							xtype : 'label',
							text : 'File ID: ',
							style: 'margin: 3px;'
						},
						groupDocsViewer.fileid,
                        {
                            xtype : 'label',
                            text : 'Frame border width: ',
                            style: 'margin: 3px;'
                        },
                        groupDocsViewer.frameborder,
                        {
                            xtype : 'label',
                            text : 'Frame width: ',
                            style: 'margin: 3px;'
                        },
                        groupDocsViewer.width,
                        {
                            xtype : 'label',
                            text : 'Frame height: ',
                            style: 'margin: 3px;'
                        },
                        groupDocsViewer.height,
                        {
                        	xtype: 'button',
                        	text: 'Save',
                        	colspan: 2,
                            width: 150,
                            style: 'margin: 3px;'
                        }
					]
				});

		var tabPanel = Ext.getCmp("pimcore_panel_tabs");
		tabPanel.add(groupDocsViewer.panel);
		tabPanel.activate("groupdocs_viewer_plugin_tab_panel");

		pimcore.layout.refresh();
	}
});
var groupDocsViewer = new pimcore.plugin.GroupDocsViewer();