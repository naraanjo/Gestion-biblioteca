<template>
  <div>
    <h2>Lista de libros</h2>
    <ul>
      <li v-for="book in books" :key="book.id">
        {{ book.title }} — {{ book.author?.name ?? 'Sin autor' }} ({{ book.published_year }})
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      books: []
    }
  },
  mounted() {
    fetch('/api/libros') // Llamada a la API de Laravel
      .then(res => res.json())
      .then(data => {
        this.books = data;
      })
      .catch(err => console.error('Error al cargar libros:', err));
  }
}
</script>
