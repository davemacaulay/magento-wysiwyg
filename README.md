## Magento_Wysiwyg
This is an example implementation of abstracting the WYSIWYG component to allow customisation of the WYSIWYG's through configuration.

### Adding a new WYSIWYG type
This can be achieved by implementing further types within a modules `di.xml` file for the class `\Magento\Wysiwyg\Model\Types`. 

Here is an example of the potential contents:
```xml
<type name="Magento\Wysiwyg\Model\Types">
    <arguments>
        <argument name="types" xsi:type="array">
            <item name="tinymce_v4" xsi:type="array">
                <item name="label" xsi:type="string">TinyMCE</item>
                <item name="version" xsi:type="string">4.6.4</item>
                <item name="component" xsi:type="string">Magento_Wysiwyg/js/tinymcev4/wysiwyg-component</item>
                <item name="template" xsi:type="string">Magento_Wysiwyg/tinymcev4/wysiwyg</item>
            </item>
        </argument>
    </arguments>
</type>
```

You then have to implement a component & template, these followed Magento's core implementations. However the component should extend from `Magento_Wysiwyg/js/component/wysiwyg-component`.

### Changing WYSIWYG type
You can change the currently enabled WYSIWYG type via the system configuration.
> Configuration > General > Content Management > WYSIWYG Type

![System Configuration](http://i.imgur.com/D4gdKbg.png)

### Available editors
We provide a number of editors embedded in the WYSIWYG module which can be enabled. We currently implement:
- TinyMCE v4.6.4
![TinyMCE v4](http://i.imgur.com/vi2Fh6S.png)
- TinyMCE v3.5.8
![TinyMCE v3](http://i.imgur.com/qzaF427.png)

**Note**: These implementations do not yet include the required Magento plugins:
- Magento Widgets
- Magento Variables
- Magento Media Gallery
