<?php
namespace softr\Twiko\Console\Commands;

/**
 * Twiko Clear command.
 *
 * @copyright  Agência Softr <agencia.softr@gmail.com>
 * @license    http://www.makoframework.com/license
 */
class Clear extends \mako\reactor\Command
{
    use \mako\syringe\ContainerAwareTrait;

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