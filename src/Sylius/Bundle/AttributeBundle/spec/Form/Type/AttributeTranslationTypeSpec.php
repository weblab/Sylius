<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\AttributeBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\AttributeBundle\Form\Type\AttributeTranslationType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Gonzalo Vilaseca <gvilaseca@reiss.co.uk>
 */
final class AttributeTranslationTypeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('ProductAttributeTranslation', ['sylius'], 'server');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AttributeTranslationType::class);
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement(FormTypeInterface::class);
    }

    function it_builds_form_with_proper_fields(FormBuilder $builder)
    {
        $builder
            ->add('name', 'text', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, []);
    }

    function it_defines_assigned_data_class(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(['data_class' => 'ProductAttributeTranslation', 'validation_groups' => ['sylius']])
            ->shouldBeCalled()
        ;

        $this->configureOptions($resolver);
    }

    function it_has_name()
    {
        $this->getName()->shouldReturn('sylius_server_attribute_translation');
    }
}
