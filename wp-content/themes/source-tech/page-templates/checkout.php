<?php
/**
 * Template Name: Checkout - Foxycart
 */
get_header('foxycart'); ?>

{% include 'svg.inc.twig' %}

{% import "utils.inc.twig" as utils %}
{% embed 'checkout.inc.twig' %}
{% endembed %}

<?php get_footer(); ?>
