# Morph View Block Bundle

### Usage
1. Create class which will be responsible for block logic
    ```php
   <?php

   namespace WideMorph\Morph\Bundle\MorphViewBundle\Domain\Block;

   use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block\AbstractBlock;

   class TestBlock extends AbstractBlock
   {
       public function getPriority(): int
       {
            return 1;
       }

        public function getBlockName(): string
        {
            return 'morph.test';
        }

        public function getTemplatePath(): string
        {
            return '@MorphView/text.html.twig';
        }
   }
   ```
2. Add twig function call for block render `{{ morph_block_render('morph.test') }}`
3. You can pass second parameter to twig function like `{{ morph_block_render('morph.test', {'param one': value}) }}`
   and this parameter will be passed in twig `render` function, and you can use them in your template.