<?php

return
[
    /**
     * ---------------------------------------------------------
     * Extension
     * ---------------------------------------------------------
     *
     * File extension for Twig view files.
     */
    'extension' => '.twig',

    /**
     * ---------------------------------------------------------
     * Accepts all Twig environment configuration options
     * ---------------------------------------------------------
     *
     * http://twig.sensiolabs.org/doc/api.html#environment-options
     */
    'environment' =>
    [
        /**
         * When set to true, the generated templates have a __toString() method
         * that you can use to display the generated nodes. (default: false)
         *
         */
        'debug' => false,

        /**
         * The charset used by the templates (default: utf-8).
         *
         */
        'charset' => 'utf-8',

        /**
         * An absolute path where to store the compiled templates, or false to disable caching.
         * Default: cache file storage path
         *
         */
        'cache' => MAKO_APPLICATION_PATH . '/storage/cache/views/twig',

        /**
         * When developing with Twig, it's useful to recompile the template
         * whenever the source code changes. If you don't provide a value
         * for the auto_reload option, it will be determined automatically based on the debug value.
         *
         */
        'auto_reload' => true,

        /**
         * If set to false, Twig will silently ignore invalid variables
         * (variables and or attributes/methods that do not exist) and
         * replace them with a null value. When set to true, Twig throws an exception instead.
         *
         */
        'strict_variables' => false,

        /**
         * If set to true, auto-escaping will be enabled by default for all templates. (default: 'html')
         *
         */
        'autoescape' => 'html',

        /**
         * A flag that indicates which optimizations to apply
         * (default to -1 -- all optimizations are enabled; set it to 0 to disable)
         *
         */
        'optimizations' => -1,
    ],

    /*
     * --------------------------------------------------------------------------
     * Global variables
     * --------------------------------------------------------------------------
     *
     * These will always be passed in and can be accessed as Twig variables.
     * NOTE: these will be overwritten if you pass data into the view with the same key.
     *
     */
    'globals' => [],
];