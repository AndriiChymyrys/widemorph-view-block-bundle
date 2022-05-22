# Morph View Block Bundle

### Usage
1. Create class which will be responsible for block logic
    ```
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
2. Then register it as a service with tag `morph.view.block`