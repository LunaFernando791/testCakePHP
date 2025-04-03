<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProyectosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProyectosTable Test Case
 */
class ProyectosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProyectosTable
     */
    public $Proyectos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Proyectos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Proyectos') ? [] : ['className' => ProyectosTable::class];
        $this->Proyectos = TableRegistry::getTableLocator()->get('Proyectos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Proyectos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
