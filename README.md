## Magento_Wysiwyg
This is an example implementation of abstracting the WYSIWYG component to allow customisation of the WYSIWYG's through configuration.

### Adding a new WYSIWYG type
This can be achieved by implementing `wysiwyg.xml` within your module. 

Here is an example of the potential contents:
```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="wysiwyg.xsd">
    <types>
        <wysiwyg name="example_wysiwyg">
            <label>Example</label>
            <version>1.0.0</version>
            <component>Namespace_Module/js/wysiwyg-component</component>
            <template>Namespace_Module/wysiwyg</template>
        </wysiwyg>
    </types>
</config>
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
