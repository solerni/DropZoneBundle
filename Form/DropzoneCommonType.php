<?php

namespace Icap\DropzoneBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DropzoneCommonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stayHere', 'hidden', array(
                'mapped' => false
            ))
            ->add('instruction', 'tinymce', array(
                'required' => false
            ))

            ->add('allowWorkspaceResource', 'checkbox', array('required' => false))
            ->add('allowUpload', 'checkbox', array('required' => false))
            ->add('allowUrl', 'checkbox', array('required' => false))
            ->add('allowRichText', 'checkbox', array('required' => false))

            ->add('peerReview', 'choice', array(
                'required' => true,
                'choices' => array(
                    false => 'Standard evaluation',
                    true => 'Peer review evaluation'
                ),
                'expanded' => true,
                'multiple' => false
            ))
            ->add('expectedTotalCorrection', 'integer', array('required' => true))

            ->add('displayNotationToLearners', 'checkbox', array('required' => false))
            ->add('displayNotationMessageToLearners', 'checkbox', array('required' => false))
            ->add('minimumScoreToPass', 'integer', array('required' => true))

            ->add('manualPlanning', 'choice', array(
                'required' => true,
                'choices' => array(
                    true => 'manualPlanning',
                    false => 'sheduleByDate'
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('manualState', 'choice', array(
                'choices' => array(
                    'notStarted' => 'notStartedManualState',
                    'allowDrop' => 'allowDropManualState',
                    'peerReview' => 'peerReviewManualState',
                    'allowDropAndPeerReview' => 'allowDropAndPeerReviewManualState',
                    'finished' => 'finishedManualState',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('startAllowDrop', 'datetime', array('date_widget' => 'single_text', 'time_widget' => 'single_text', 'with_seconds' => false, 'required' => false))
            ->add('endAllowDrop', 'datetime', array('date_widget' => 'single_text', 'time_widget' => 'single_text', 'with_seconds' => false, 'required' => false))
            ->add('startReview', 'datetime', array('date_widget' => 'single_text', 'time_widget' => 'single_text', 'with_seconds' => false, 'required' => false))
            ->add('endReview', 'datetime', array('date_widget' => 'single_text', 'time_widget' => 'single_text', 'with_seconds' => false, 'required' => false));
    }

    public function getName()
    {
        return 'icap_dropzone_common_form';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'language' => 'en',
                'translation_domain' => 'icap_dropzone',
            )
        );
    }
}