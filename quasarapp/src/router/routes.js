
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '',
       component: () => import('pages/Index.vue') 
      },
      { path: '/Student',
       component: () => import('pages/students/index.vue') 
      },
      { path: '/student/create',
       component: () => import('pages/students/create.vue') 
      },
      { path: '/student/edit/:id', 
      component: () => import('pages/students/edit.vue') 
      },
      { path: '/student/info/:id', 
      component: () => import('pages/students/info.vue') 
      },
      { path: '/teacher', 
      component: () => import('pages/teachers/index.vue') 
      },
       { path: '/teacher/edit/:id', 
      component: () => import('pages/teachers/edit.vue') 
      },
      { path: '/teacher/info/:id', 
      component: () => import('pages/teachers/info.vue') 
      },
      { path: '/teacher/create',
       component: () => import('pages/teachers/create.vue')
      },
      
      { path: '/teacher/info',
       component: () => import('pages/teachers/info.vue')
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
      { path: '/staffs/create',
       component: () => import('pages/Staffs/create.vue')
      },
      { path: '/staffs/edit/:id', 
      component: () => import('pages/staffs/edit.vue') 
      },
      { path: '/staffs/info/:id', 
      component: () => import('pages/staffs/info.vue') 
      },
      { path: '/exam', 
      component: () => import('pages/exams/index.vue') 
      },
      { path: '/fees', 
      component: () => import('pages/fees/index.vue') 
      },
      { path: '/searchduefees', 
      component: () => import('pages/searchduefees/index.vue') 
      },
      { path: '/feesmaster', 
      component: () => import('pages/feesmaster/index.vue') 
      },
      { path: '/feesgroup', 
      component: () => import('pages/feesgroup/index.vue') 
      },
      { path: '/feestype', 
      component: () => import('pages/feestype/index.vue') 
      },
      { path: '/feesdiscount', 
      component: () => import('pages/feesdiscount/index.vue') 
      },
      { path: '/feesforward', 
      component: () => import('pages/feesforward/index.vue') 
      },
      { path: '/feesreminder', 
      component: () => import('pages/feesreminder/index.vue') 
      },
      { path: '/addincome', 
      component: () => import('pages/addincome/index.vue') 
      },
      { path: '/incomesearch', 
      component: () => import('pages/incomesearch/index.vue') 
      },
      { path: '/incomehead', 
      component: () => import('pages/incomehead/index.vue') 
      },
      { path: '/expense', 
      component: () => import('pages/expense/index.vue') 
      },
      { path: '/expensesearch', 
      component: () => import('pages/expensesearch/index.vue') 
      },
      { path: '/expensehead', 
      component: () => import('pages/expensehead/index.vue') 
      },
      { path: '/examgroup', 
      component: () => import('pages/examgroup/index.vue') 
      },
      { path: '/examschedule', 
      component: () => import('pages/examschedule/index.vue') 
      },
      { path: '/examresult', 
      component: () => import('pages/examresult/index.vue') 
      },
      { path: '/admitcard', 
      component: () => import('pages/admitcard/index.vue') 
      },
      { path: '/printadmitcard', 
      component: () => import('pages/printadmitcard/index.vue') 
      },
      { path: '/marksheet', 
      component: () => import('pages/marksheet/index.vue') 
      },
      { path: '/printmarksheet', 
      component: () => import('pages/printmarksheet/index.vue') 
      },
      { path: '/grade', 
      component: () => import('pages/grade/index.vue') 
      },
      { path: '/syllabus', 
      component: () => import('pages/syllabus/index.vue') 
      },
      { path: '/ManageSyllabusStatus', 
      component: () => import('pages/ManageSyllabusStatus/index.vue') 
      },
      { path: '/lessonplan', 
      component: () => import('pages/lessonplan/index.vue') 
      },
      { path: '/topic', 
      component: () => import('pages/topic/index.vue') 
      },
      { path: '/classtimetable', 
      component: () => import('pages/classtimetable/index.vue') 
      },
      { path: '/mytimetable', 
      component: () => import('pages/mytimetable/index.vue') 
      },
      { path: '/staffdirectory', 
      component: () => import('pages/staffdirectory/index.vue') 
      },
      { path: '/staffattendance', 
      component: () => import('pages/staffattendance/index.vue') 
      },
      { path: '/payroll', 
      component: () => import('pages/payroll/index.vue') 
      },
      { path: '/leavetypes', 
      component: () => import('pages/leavetypes/index.vue') 
      },
      { path: '/humandepartment', 
      component: () => import('pages/humandepartment/index.vue') 
      },
      { path: '/booklist', 
      component: () => import('pages/library/index.vue') 
      },
      { path: '/library/create',
       component: () => import('pages/library/create.vue') 
      },
      { path: '/library/edit/:id', 
      component: () => import('pages/library/edit.vue') 
      },
      { path: '/library/info/:id', 
      component: () => import('pages/library/info.vue') 
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
