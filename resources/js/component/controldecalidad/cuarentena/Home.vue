<template>
  <div>
    <!-- @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif -->
    <table class="table table-bordered table-striped table-hover datatable" v-if="cuarentenas.length > 0">
      <thead>
      <tr style="text-align: center;">
        <th>Opciones</th>
        <th>Usuario</th>
        <th>Motivo</th>
        <th>Comprometidas</th>
        <th>En cuarentena</th>
        <th>Liberadas</th>
        <th>Fecha de cuarentena</th>
        <th>Fecha de alta</th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="cuarentena in cuarentenas" :key="cuarentena.id" style="text-align: center;">
          <td>
              <a href="" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Editar</a>
          </td>
          <td>{{ cuarentena.joinUser.name }}</td>
          <td>{{ cuarentena.motivo }}</td>
          <td>{{ cuarentena.countTotal() }}</td>
          <td>{{ cuarentena.countCuarentena() }}</td>
          <td>{{ cuarentena.countReleased() }}</td>
          <td>{{ cuarentena.created_at.format('d/m/Y h:i') }}</td>
          <td>{{ cuarentena.released_at }}</td>
        </tr>
      </tbody>
    </table>
    <h3 v-else>No hay cuarentenas creadas</h3>
  </div>
</template>

<script>
export default {
  name: 'home',
  props: {
    cuarentenas: {
      type: Array,
      default: () => { return [] }
    }
  },
  methods: {
    createCuarentena () {
    }
  }
}
</script>

<style scoped>

  .datatable tbody tr td {
    text-align: center;
  }

  .datatable thead th {
    background-color: #2D6CA2;
    color: white;
    text-align: center;
  }

</style>