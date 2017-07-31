## Magento_Wysiwyg
This is an example implementation of abstracting the WYSIWYG component to allow customisation of the WYSIWYG's through configuration.

### Adding a new WYSIWYG type
This can be achieved by implementing `wysiwyg.xml` within your module. 

Here is an example of the potential contents:
```
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