<?php
/**
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade Smile Elastic Suite to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile\ElasticsuiteCore
 * @author    Romain Ruaud <romain.ruaud@smile.fr>
 * @copyright 2016 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Smile\ElasticsuiteCore\Search\Request\ContainerConfiguration;

use Smile\ElasticsuiteCore\Api\Search\Request\Container\RelevanceConfiguration\FuzzinessConfigurationInterface;
use Smile\ElasticsuiteCore\Api\Search\Request\Container\RelevanceConfiguration\PhoneticConfigurationInterface;
use Smile\ElasticsuiteCore\Api\Search\Request\Container\RelevanceConfigurationInterface;

/**
 * Relevance Configuration object
 *
 * @category Smile
 * @package  Smile\ElasticsuiteCore
 * @author   Romain Ruaud <romain.ruaud@smile.fr>
 */
class RelevanceConfig implements RelevanceConfigurationInterface
{
    /**
     * @var string
     */
    private $minimumShouldMatch;

    /**
     * @var float
     */
    private $tieBreaker;

    /**
     * @var int|null
     */
    private $phraseMatchBoost;

    /**
     * @var float
     */
    private $cutOffFrequency;

    /**
     * @var FuzzinessConfigurationInterface
     */
    private $fuzzinessConfiguration;

    /**
     * @var PhoneticConfigurationInterface
     */
    private $phoneticConfiguration;

    /**
     * RelevanceConfiguration constructor.
     *
     * @param string                               $minimumShouldMatch Minimum should match clause of the text query.
     * @param float                                $tieBreaker         Tie breaker for multimatch queries.
     * @param int|null                             $phraseMatchBoost   The Phrase match boost value, or null if not
     *                                                                 enabled
     * @param float                                $cutOffFrequency    The cutoff Frequency value
     * @param FuzzinessConfigurationInterface|null $fuzziness          The fuzziness Configuration, or null
     * @param PhoneticConfigurationInterface|null  $phonetic           The phonetic Configuration, or null
     *
     * @internal param $fuzziness
     * @internal param $phonetic
     */
    public function __construct(
        $minimumShouldMatch,
        $tieBreaker,
        $phraseMatchBoost,
        $cutOffFrequency,
        FuzzinessConfigurationInterface $fuzziness = null,
        PhoneticConfigurationInterface $phonetic = null
    ) {
        $this->minimumShouldMatch     = $minimumShouldMatch;
        $this->tieBreaker             = $tieBreaker;
        $this->phraseMatchBoost       = $phraseMatchBoost;
        $this->cutOffFrequency        = $cutOffFrequency;
        $this->fuzzinessConfiguration = $fuzziness;
        $this->phoneticConfiguration  = $phonetic;
    }

    /**
     * {@inheritDoc}
     */
    public function getMinimumShouldMatch()
    {
        return $this->minimumShouldMatch;
    }

    /**
     * {@inheritDoc}
     */
    public function getTieBreaker()
    {
        return $this->tieBreaker;
    }

    /**
     * @return int|null
     */
    public function getPhraseMatchBoost()
    {
        return (int) $this->phraseMatchBoost;
    }

    /**
     * @return float
     */
    public function getCutOffFrequency()
    {
        return (float) $this->cutOffFrequency;
    }

    /**
     * Retrieve FuzzinessConfiguration
     *
     * @return FuzzinessConfigurationInterface|null
     */
    public function getFuzzinessConfiguration()
    {
        return $this->fuzzinessConfiguration;
    }

    /**
     * Retrieve Phonetic Configuration
     *
     * @return PhoneticConfigurationInterface|null
     */
    public function getPhoneticConfiguration()
    {
        return $this->phoneticConfiguration;
    }

    /**
     * Check if fuzziness is enabled
     *
     * @return bool
     */
    public function isFuzzinessEnabled()
    {
        return ($this->fuzzinessConfiguration !== null);
    }

    /**
     * Check if phonetic search is enabled
     *
     * @return bool
     */
    public function isPhoneticSearchEnabled()
    {
        return ($this->phoneticConfiguration !== null);
    }
}
