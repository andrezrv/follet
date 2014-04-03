# Follet Development Principles

Just as WordPress, Follet is opinionated software. This means that it presents a clear statement about how things are expected to be done. The presence of every feature (and sometimes even its absence) relies (or at least it should) on a conscious decision, made to provide both a great experience for the user, and code that is easy to understand and extend for the developer. These are the principles that rule the development process of Follet:

* Themes should be fully translatable.
* Themes should support child themes.
* Themes should be easy to understand and customize, both for end users and developers.
* Classes should be used when class properties are required, not as simple containers for functions.
* Preferentially, class methods should not be applied directly in template files. Non-programmer developers are more familiar to functions than they are to object-related notions.
* Themes should not add new [global variables](https://codex.wordpress.org/Global_Variables). If a container for information and functionality is needed, use a [singleton](http://code.tutsplus.com/articles/design-patterns-in-wordpress-the-singleton-pattern--wp-31621) instead.
* Functional-only features are [plugin territory](https://make.wordpress.org/themes/guidelines/guidelines-plugin-territory/) and should be avoided as much as possible.
* Mixed functional and presentational features may be supported, but not enabled by default, since they might lead to conflicts when switching to other theme.
* Themes should provide few but powerful and understandable customization options. Any supported option or feature that might break the simplicity of a theme should be preferentially disabled by default.
* All the customizations that can be performed via the admin area should be preferentially managed through the [theme customizer](https://codex.wordpress.org/Theme_Customization_API), since that way changes can be seen and tested live before being applied, relying in WordPress built-in functionality. Theme options are discouraged, for they can lead to broken output that cannot be easily detected before being applied.
* Themes should provide understandable, extendable and mantainable code. This can be achieved, among other practices, by following the [WordPress Coding Standards](http://codex.wordpress.org/WordPress_Coding_Standards), using all built-in functionality as possible, and offering [pluggable functions](http://codex.wordpress.org/Pluggable_Functions) and [filter hooks](http://codex.wordpress.org/Plugin_API/Hooks) for all the template tags called within the template files.
* PHP, JS and CSS code should be split in different files to allow other developers to deal with different design and functionality elements separatedly, as modularly as possible.
* When possible, themes should offer design elements that are visually compatible with major plugins.
* When creating content, what is seen in the editor should be as similar as possible to what is seen in the front-end.
