# abstract-theme-child


The child theme is the centerpiece. This is what you’ll actually use for development. Thanks to the powerful auto_loader class we’ve written, every directory in the theme not only has a purpose, but everything inside these folders is loaded, enqueued, or otherwise hooked in exactly the way that you’d expect based on the name automatically.

## Beautiful organization and structure to your development. 

- API: wp-rest api handlers
- acfe-php: acfe php auto sync
- assets: media
- classes: php classes
- css: global stylesheets
- js: global javascript files
- conditional: conditional resources
- settings: wp admin config
- models: cpt or other data layers
- elements: Abstract UI elements
- components: Reusable template parts
- library: ACF block declarations
- controllers: page/post/form operations
- tasks: general php operations
- templates: page/post templates
- lib: thirdparty dependancies
- default templates
- style.css
- functions.php



## Stylesheets and JavaScript

There are three folders covering these frontend resources; css, js, and conditional. 

All css or js files placed in those two respective directories will be globally enqueued. 

Within the conditional directory, you can create subfolders named after a template file and within that folder create two subfolders, js and css, and any css or js you place in those folders will be enqueued only on those pages or post types that use that template.
Example: ```mason_grid/css/grid.css``` will be loaded on any page that uses the ```mason_grid.php wordpress template file```


~~For any other conditional use case where you need to enqueue specific css or js files, the conditions.php file will allow you to declare parameters and corresponding files to load.~~
*in progress*


## The Block Mindset

Developers don’t want to use page builders, they’d rather build one their way.

We don’t go against the grain and try and turn WordPress into something that it’s not, like a visual HTML/CSS design tool. No, we go with what WordPress has baked in, Gutenberg, just not in the cumbersome way.

Sure you can still build custom Gutenberg blocks the vanilla way using react, and that’s fine and has it’s place. However, the Abstract way is to use ACF blocks since it neatly ties everything together. 

We already have ACF and ACF Forms for the frontend, so it makes perfect since to tie everything together and make ACF blocks.

Define your blocks in the blocks folder, and write your block templates in the block_templates folder. No need to wrap the registrations in action hooks, it’s handled automatically.

Think about blocks in our theme as the modular basis for creation. 


