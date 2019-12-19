<template>
    <div class="container">
  <div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap mb-2">
    <h1 class="h1 text-center">Registro de Asistencia</h1>
    <button class="btn btn-success" v-on:click="getStudent()">Guardar</button>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="form-group col-12 col-md-6 row">
          <label for="curso" class="col-sm-4 col-form-label">Curso</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control" id="curso" value="Aplicaciones Web">
          </div>
        </div>
        <div class="form-group col-12 col-md-6 row">
          <label for="docente" class="col-sm-4 col-form-label">Docente</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control" id="docente" value="Jaime Suasnabar">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12 col-md-6 row">
          <label for="semestre" class="col-sm-6 col-form-label">Semestre Académico</label>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" id="semestre" value="2019-II">
          </div>
        </div>
        <div class="form-group col-12 col-md-6 row">
          <label for="tema" class="col-sm-2 col-form-label">Tema</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tema" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12 col-md-6 row">
          <label for="aula" class="col-sm-4 col-form-label">Aula</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="aula" required>
          </div>
        </div>
        <div class="form-group col-12 col-md-6 row">
          <label for="avance" class="col-sm-4 col-form-label">Avance %</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="avance" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12 col-md-6 row">
          <label for="fecha" class="col-sm-4 col-form-label">Fecha</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="fecha" value="10/11/2019">
          </div>
        </div>
        <div class="form-group col-12 col-md-6 row">
          <label for="hora" class="col-sm-4 col-form-label">Hora</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="hora"  value="11:17">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Nro</th>
          <th colspan="6">Apellidos y Nombres</th>
          <th>Asistencia</th>
        </tr>
      </thead>
      <tbody>
        
          <tr v-for="student in arrayStudent" :key="student.id">
            <td scope="col" v-text="student.id"></td>
            <td colspan="6"  v-text="student.code"></td>
            <td>
              <div class="form-group m-0">
                <!-- <v-select :options="attendance" v-model="attendance"></v-select> -->
                <select @click="saveAttendance(student.id)" v-bind:id="student.id">
                  <option v-for="option in attendances" v-bind:value="option.value" v-bind:key="option.value">
                    {{ option.text }}
                  </option>
                </select>
                <!-- <div class="form-control">
                  <input type="radio" id="one" value="One" v-model="picked">
                  <label for="one">One</label>
                </div>
                <div class="form-control">
                  <input type="radio" id="two" value="Two" v-model="picked">
                  <label for="two">Two</label>
                </div>
                <div class="form-control">
                  <input type="radio" id="two" value="Two" v-model="picked">
                  <label for="two">Two</label>
                </div> -->
              </div>
            </td>
          </tr>
      </tbody>
    </table>
  </div>
</div>
</template>

<script>
import vueSelect from 'vue-select';
Vue.component('v-select', vueSelect)
    export default {
        data(){
            return{
                selected: [],
                arrayStudent:[],
                attendances: [
                  { text: 'Falta', value: 'a' },
                  { text: 'Presente', value: 'P' },
                  { text: 'Tarde', value: 'l' }
                ]
            }
        },
        methods: {
            getStudent(){
                let me = this;
                axios.get('/student')
                .then(function (response) {
                    // handle success
                    me.arrayStudent = response.data;
                    // console.log(response);
                    console.log(me.arrayStudent);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
            },
            saveAttendance: function(idAlumno){
              let value = document.getElementById(idAlumno).value;
              // console.log(value.value);
              // console.log(idAlumno);
              axios.post('/attendance/save', {
                student_id: idAlumno,
                status: value
              })
              .then(function (response) {
                console.log(response);
              })
              .catch(function (error) {
                console.log(error);
              });
            }
        },  
        mounted() {
            // console.log('Component mounted.')
            this.getStudent();
        }
    }
</script>
