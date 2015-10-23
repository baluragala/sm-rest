<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Guestlogins Controller
 *
 * @property \App\Model\Table\GuestloginsTable $Guestlogins
 */
class GuestloginsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('guestlogins', $this->paginate($this->Guestlogins));
        $this->set('_serialize', ['guestlogins']);
    }

    /**
     * View method
     *
     * @param string|null $id Guestlogin id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guestlogin = $this->Guestlogins->get($id, [
            'contain' => []
        ]);
        $this->set('guestlogin', $guestlogin);
        $this->set('_serialize', ['guestlogin']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guestlogin = $this->Guestlogins->newEntity();
        if ($this->request->is('post')) {
            $guestlogin = $this->Guestlogins->patchEntity($guestlogin, $this->request->data);
            if ($this->Guestlogins->save($guestlogin)) {
                $this->Flash->success(__('The guestlogin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The guestlogin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('guestlogin'));
        $this->set('_serialize', ['guestlogin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Guestlogin id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $guestlogin = $this->Guestlogins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $guestlogin = $this->Guestlogins->patchEntity($guestlogin, $this->request->data);
            if ($this->Guestlogins->save($guestlogin)) {
                $this->Flash->success(__('The guestlogin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The guestlogin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('guestlogin'));
        $this->set('_serialize', ['guestlogin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Guestlogin id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $guestlogin = $this->Guestlogins->get($id);
        if ($this->Guestlogins->delete($guestlogin)) {
            $this->Flash->success(__('The guestlogin has been deleted.'));
        } else {
            $this->Flash->error(__('The guestlogin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
