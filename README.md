## GroupDocs Viewer Plugin for PimCore CMS.

For use plugin add code to your view:
```php
<?php $groupDocs = new GroupDocsViewer_GroupDocs(); ?>
<?php echo $groupDocs->renderFrame(); ?>
```

#### For configure default params login as admin and go to "Extras" => "Configure GroupDocs Viewer"  menu.

Also you can override default params like:
```php
<?php $groupDocs1 = new GroupDocsViewer_GroupDocs(array( 'fileid' => '123', 'frameborder' => '1', 'width' => '680', 'height' => '900' )); ?>
<?php echo $groupDocs->renderFrame(); ?>
```
