import AllItem from './components/AllItem.vue';
import AddItem from './components/AddItem.vue';
import EditItem from './components/EditItem.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllItem
    },
    {
        name: 'add',
        path: '/add',
        component: AddItem
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditItem
    }
];
