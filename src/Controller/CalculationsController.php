<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Calculations Controller
 *
 * @property \App\Model\Table\CalculationsTable $Calculations
 */
class CalculationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'GuestLogins']
        ];
        $this->set('calculations', $this->paginate($this->Calculations));
        $this->set('_serialize', ['calculations']);
    }

    /**
     * View method
     *
     * @param string|null $id Calculation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calculation = $this->Calculations->get($id, [
            'contain' => ['Users', 'GuestLogins']
        ]);
        $this->set('calculation', $calculation);
        $this->set('_serialize', ['calculation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calculation = $this->Calculations->newEntity();
        if ($this->request->is('post')) {
            $calculation = $this->Calculations->patchEntity($calculation, $this->request->data);
            if ($this->Calculations->save($calculation)) {
                $this->Flash->success(__('The calculation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calculation could not be saved. Please, try again.'));
            }
        }
        $users = $this->Calculations->Users->find('list', ['limit' => 200]);
        $guestLogins = $this->Calculations->GuestLogins->find('list', ['limit' => 200]);
        $this->set(compact('calculation', 'users', 'guestLogins'));
        $this->set('_serialize', ['calculation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calculation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calculation = $this->Calculations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calculation = $this->Calculations->patchEntity($calculation, $this->request->data);
            if ($this->Calculations->save($calculation)) {
                $this->Flash->success(__('The calculation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calculation could not be saved. Please, try again.'));
            }
        }
        $users = $this->Calculations->Users->find('list', ['limit' => 200]);
        $guestLogins = $this->Calculations->GuestLogins->find('list', ['limit' => 200]);
        $this->set(compact('calculation', 'users', 'guestLogins'));
        $this->set('_serialize', ['calculation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calculation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calculation = $this->Calculations->get($id);
        if ($this->Calculations->delete($calculation)) {
            $this->Flash->success(__('The calculation has been deleted.'));
        } else {
            $this->Flash->error(__('The calculation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
