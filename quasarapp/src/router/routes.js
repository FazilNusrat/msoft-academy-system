
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '',
       component: () => import('pages/Index.vue') 
      },
      { path: '/Students',
       component: () => import('pages/students/index.vue') 
      },
      { path: '/teachers', 
      component: () => import('pages/teachers/index.vue') 
      },
      { path: '/class', 
      component: () => import('pages/class/index.vue') 
      },
      { path: '/departments', 
      component: () => import('pages/departments/index.vue') 
      },
      { path: '/subjects', 
      component: () => import('pages/subjects/index.vue') 
      },
      { path: '/batchs', 
      component: () => import('pages/batchs/index.vue') 
      },
      { path: '/times', 
      component: () => import('pages/times/index.vue') 
      },
      { path: '/staffs', 
      component: () => import('pages/staffs/index.vue') 
      },
      { path: '/exam', 
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
