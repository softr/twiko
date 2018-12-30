<?php
namespace softr\Twiko\Console\Commands;

use mako\cli\input\Input;
use mako\cli\output\Output;
use mako\config\Config;
use mako\file\FileSystem;

/**
 * Twiko Clear command.
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class Clear extends \mako\reactor\Command
{
    /**
     * Command information.
     *
     * @var array
     */
    protected $commandInformation =
    [
        'description' => 'Clear the Twig cache.'
    ];

    /**
     * Config Instance
     *
     * @var  \mako\config\Config
     */
    protected $config;

    /**
     * FileSystem Instance
     *
     * @var  \mako\file\FileSystem
     */
    protected $fileSystem;

    /**
     * Constructor
     *
     * @param  Input       $input       Input instance
     * @param  Output      $output      Input instance
     * @param  Config      $config      Config instance
     * @param  FileSystem  $fileSystem  FileSystem instance
     */
    public function __construct(Input $input, Output $output, Config $config, FileSystem $fileSystem)
    {
        parent::__construct($input, $output);

        $this->config = $config;

        $this->fileSystem = $fileSystem;
    }

    /**
     * Prints a greeting.
     *
     * @access  public
     */
    public function execute()
    {
        $environment = $this->config->get('twiko::config.environment');

        if($environment['cache'])
        {
            $cacheDirectory = $environment['cache'];

            if($this->fileSystem->isDirectory($cacheDirectory))
            {
                if($this->fileSystem->removeDirectory($cacheDirectory))
                {
                    $this->write('<green>Twig cache cleaned.</green>');
                }
                else
                {
                    $this->error('Twig cache failed to be cleaned.');
                }
            }
        }
        else
        {
            $this->write('<yellow>Twig cache is not enabled.</yellow>');
        }
    }
}