<template>
  <q-layout view="hHh LpR fFf" class="shadow-2 rounded-borders">
    <q-header elevated>
      <q-toolbar class="bg-cyan-7">
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-toolbar-title> Academy Management System </q-toolbar-title>

        <div>Academy v{{ $q.version }}</div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      content-class="bg-grey-1"
    >
      <q-item-label header>Navigation</q-item-label>
      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="ControlPanel"
      >
        <q-list class="q-ml-md">
          <q-item clickable class="my_hover" dense v-ripple to="/class">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="school"
              />
            </q-item-section>
            <q-item-section>Add Class</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/class?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/departments"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="manage_accounts"
              />
            </q-item-section>
            <q-item-section>Section</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/departments?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/batchs">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="batch_prediction"
              />
            </q-item-section>
            <q-item-section>Add Batch</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/batchs?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/subjects"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="subject"
              />
            </q-item-section>
            <q-item-section>Add Subjects</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/subjects?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/times">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="history"
              />
            </q-item-section>
            <q-item-section>Add Time</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/times?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>
      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Data Entery"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/student"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Students</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/student?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/teacher"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Teacher</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/teacher?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/staffs">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Staff</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/staffs?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>

      <!-- Fees Collection part -->
      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Fees Collection"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/fees"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Collect Fees</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/searchduefees">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Search Due Fees</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/feesmaster">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Fees Master</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/feesgroup">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Fees Group </q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/feestype">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Fees Type</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/feesdiscount">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Fees Discount</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/feesforward">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Fees Forward</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/feesreminder">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Fees Reminder</q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>

        <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Income"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/addincome"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Add Income</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/incomesearch">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Income Search</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/incomehead">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Income Head</q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>

        <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Expenses"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/expense"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Add Expense</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/expensesearch">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Search Expense</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/expensehead">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Expense Head</q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>


        <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Attendance"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/studentAttendance"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Student Attendance</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/AttendanceByGroup">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Attendance By Date</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/ApproveLeave">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Approve Leave</q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>


        <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Examination"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/examgroup"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Exam Group</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/examschedule">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Exam Schedule</q-item-section>
          </q-item>
          <q-item clickable class="my_hover" dense v-ripple to="/examresult">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Exam Result</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/admitcard">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Design Admit Card</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/printadmitcard">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Print Admin Card</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/marksheet">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Mark Sheet</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/printmarksheet">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Print Mark Sheet</q-item-section>
          </q-item>

          <q-item clickable class="my_hover" dense v-ripple to="/grade">
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Mark Grade</q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>
       <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Online Examination"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/OnlineExam"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Onlin Exam</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/OnlineBank?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/OnlineBank"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Online Bank</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/teachers?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>

             <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Lesson Plan"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/syllabus"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Lesson Plan</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ManageSyllabusStatus?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ManageSyllabusStatus"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Manage Syllabus Status</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/teachers?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/lessonplan"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Lesson </q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/teachers?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/topic"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Topic</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Topic?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>

       <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Academics"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/classtimetable"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Class Time Table</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ClassTImetable?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/mytimetable"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Teacher Timetable</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/TeacherTimetable?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AssignClassTeacher"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Assign Class Teacher</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AssignClassTeacher?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/PromoteStudents"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Promote Students</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/PromoteStudents?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/SubjectGroup"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Subject Group</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/SubjectGroup?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Subjects"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Subjects</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Subjects?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Class"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Class</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Class?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Sections"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Section</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Section?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>

        </q-list>
      </q-expansion-item>



       <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Human Resource"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/staffdirectory"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Staff Directory</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/StaffDirectory?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/staffattendance"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Staff Attendance</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/StaffAttendance?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/payroll"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Payroll</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Payroll?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ApproveLeaveRequest"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Approve Leave Request</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ApproveLeaveRequest?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ApplyLeave"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Apply Leave</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ApplyLeave?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/leavetypes"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Leave Type</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/LeaveType?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/TeacerRating"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Teacer Rating</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/TeacerRating?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/departments"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Department</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Department?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>

            <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/DisabledStaff"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Disabled Staff</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/DisabledStaff?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>

        </q-list>
      </q-expansion-item>




      
       <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Communicate"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/NoticeBoard"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Notice Board</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/NoticeBoard?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/SendEmail"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Send Email</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/SendEmail?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/SendSMS"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Send SMS</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/SendSMS?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/EmailSMSLog"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Email/SMS Log</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/EmailSMSLog?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ApplyLeave"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Apply Leave</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ApplyLeave?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/LeaveType"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Leave Type</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/LeaveType?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/TeacerRating"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Teacer Rating</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/TeacerRating?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Department"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Department</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Department?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>

            <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/DisabledStaff"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Disabled Staff</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/DisabledStaff?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>

        </q-list>
      </q-expansion-item>

<q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Download Center"
      >

        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/UploadContent"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Upload Content</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/UploadContent?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Assignments"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Assignments</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Assignments?id=7" round flat></q-btn>
              </q-item-section>

          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/StudyMaterial"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Study Material</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/StudyMaterial?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
             <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Syllabus"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Syllabus</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Syllabus?id=7" round flat></q-btn>
              </q-item-section>
              
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/OtherDownloads"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Other Downloads</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/OtherDownloads?id=7" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>      
     <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Home Work"
      >

        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AddHomeWork"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>AddHomeWork</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AddHomeWork" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>   
     
     <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Library"
      >

        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Booklist"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Book list</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Booklist" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/IssueReturn"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Issue Return</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/IssueReturn" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AddStudent"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Add Student</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AddStudent" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AddStaffMember"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Add Staff Member</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AddStaffMember" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>   

        <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Inventory"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/IssueItem"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Issue Item</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/IssueItem" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AddItemStock"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Add Item Stock</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AddItemStock" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AddItem"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Add Item</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AddItem" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ItemCategory"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Item Category</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ItemCategory" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ItemStore"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Item Store</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ItemStore" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ItemSupplier"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Item Supplier</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ItemSupplier" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 

      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Transport"
      >
        <q-list class="q-ml-md">
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Routes"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Routes</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Routes" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Vehicles"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Vehicles</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Vehicles" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AssignVehicle"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Assign Vehicle</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AssignVehicle" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 
      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Hostel"
      >
        <q-list class="q-ml-md">
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/HostelRooms"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Hostel Rooms</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/HostelRooms" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/RoomType"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Room Type</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/RoomType" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Hostel"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Hostel</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Hostel" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 
     <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Certificate"
      >
        <q-list class="q-ml-md">
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/StudentCertificate"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Student Certificate</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/StudentCertificate" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/GenerateCertificate"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Generate Certificate</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/GenerateCertificate" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/StudentIdCard"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>StudentIDCard</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/StudentIdCard" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/GenerateIdCard"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Generate ID Card</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/GenerateIDCard" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/StaffIdCard"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Staff ID Card</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/StaffIdCard" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/GenerateStaffIdCard"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Generate Staff ID Card</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/GenerateStaffIdCard" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 
      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Front CMS"
      >
        <q-list class="q-ml-md">
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Event"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Event</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Event" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Gallery"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Gallery</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Gallery" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/News"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>News</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/News" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/MediaManager"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Media Manager</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/MediaManager" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/pages"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>pages</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/pages" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Menus"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Menus</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Menus" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/BannerImage"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Banner Image</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/BannerImage" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 

      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Alumni"
      >
        <q-list class="q-ml-md">
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/ManageAlumni"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Manage Alumni</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/ManageAlumni" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Events"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Events</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Events" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 

      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Reports"
      >
        <q-list class="q-ml-md">
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/StudentInformation"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Student Information</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/StudentInformation" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Finance"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Finance</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Finance" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Attendance"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Attendance</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Attendance" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Examination"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Examinations</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Examination" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/OnlineExaminations"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>OnlineExaminations</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/OnlineExaminations" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/LessonPlan"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Lesson Plan</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/LessonPlan" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/HumanResource"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Human Resource</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/HumanResource" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Library"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Library</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Library" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Inventory"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Inventory</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Inventory" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Transport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Transport</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Transport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Hostel"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Hostel</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Hostel" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Users"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Users</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Users" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Modules"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Modules</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Modules" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/CustomFields"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Custom Fields</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/CustomFields" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 




       <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="System Settings"
      >
        <q-list class="q-ml-md">
        </q-list>
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/GeneralSetting"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>General Setting</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/GeneralSetting" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/SessionSetting"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Session Setting</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/SessionSetting" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/NotificationSetting"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Notification Setting</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/NotificationSetting" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/SMSSetting"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>SMS Settings</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/SMSSetting" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/EmailSetting"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Email Setting</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/EmailSetting" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/PaymentMethods"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Payment Methods</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/PaymentMethods" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/PrintHeaderFooter"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Print Header Footer</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/PrintHeaderFooter" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/FrontCMSSetting"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Front CMS Setting</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/FrontCMSSetting" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/RolesPermissions"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Roles Permissions</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/RolesPermissions" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/BackupRestore"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Backup / Restore</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/BackupRestore" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/Languages"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Languages</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/Languages" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/UserLog"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>User Log</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/UserLog" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/AuditTrailReport"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Audit Trail Report</q-item-section>
            <q-item-section side>
                <q-btn icon="mdi-plus" color="black" size="sm" to="/AuditTrailReport" round flat></q-btn>
              </q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item> 




    </q-drawer>
    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import EssentialLink from "components/EssentialLink.vue";

const linksData = [
  {
    title: "Student",
    caption: "quasar.dev",
    icon: "school",
    link: "pages/students/index.vue",
  },
  {
    title: "Teachares",
    caption: "github.com/quasarframework",
    icon: "code",
    link: "pages/teachars/index.vue",
  },
];
export default {
  name: "MainLayout",
  components: { EssentialLink },
  data() {
    return {
      leftDrawerOpen: false,
      essentialLinks: linksData,
      link: "inbox",
    };
  },
};
</script>
<style lang="sass">
.my-menu-link
  color: white
  background: #F2C037
</style>