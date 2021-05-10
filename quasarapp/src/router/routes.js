
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '',
       component: () => import('pages/Index.vue') 
      },
      { path: '/Students/index',
       component: () => import('pages/students/index.vue') 
      },
      { path: '/teachers/index', 
      component: () => import('pages/teachers/index.vue') 
      },
      { path: '/class/index', 
      component: () => import('pages/class/index.vue') 
      },
      { path: '/departments/index', 
      component: () => import('pages/departments/index.vue') 
      },
      { path: '/subjects/index', 
      component: () => import('pages/subjects/index.vue') 
      },
      { path: '/batchs/index', 
      component: () => import('pages/batchs/index.vue') 
      },
      { path: '/times/index', 
      component: () => import('pages/times/index.vue') 
      },
      { path: '/staffs/index', 
      component: () => import('pages/staffs/index.vue') 
      },
      { path: '/exam/index', 
      component: () => import('pages/exams/index.vue') 
      },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
