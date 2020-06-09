<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/pure.css">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">Admin</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Dashboard</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Categories</a></li>

                <li class="pure-menu-item menu-item-divided pure-menu-selected">
                    <a href="#" class="pure-menu-link">Products</a>
                </li>

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Users</a></li>
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <h2>Products List</h2>
        </div>

        <div class="content">
            <div id="app">
                <form class="pure-form" id="search">
                <div class="pure-control-group">
                <label for="q">Search for</label>
                    <input name="q" v-model="query" class="pure-input">
                </div>
                </form>
                
                <product-grid
                    :products="products"
                    :columns="columns"
                    :filter-key="query"
                >
                </product-grid>
            </div>
        </div>
    </div>
</div>

<script src="/js/vue.js"></script>

<script>
    Vue.component("product-grid", {
        template: `
                <table class="pure-table pure-table-bordered">
                <thead>
                <tr>
                    <th v-for="key in columns">
                        {{ key | capitalize }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="entry in filteredProducts">
                    <td v-for="key in columns">
                    {{entry[key]}}
                    </td>
                </tr>
                </tbody>
            </table>
        `,
        props: {
          products: Array,
          columns: Array,
        },
        computed: {
          filteredProducts: function() {
            let products = this.products;
            return products;
          }
        },
        filters: {
          capitalize: function(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
          }
        },
    });
    
    const app = new Vue({
        el: "#app",
        data: {
          query: "",
          columns: ["id", "name", "price"],
          products: [
            { id: 1, name: "Black Dog", price: 100 },
            { id: 2, name: "Yellow Dog", price: 900 },
            { id: 3, name: "White Cat", price: 700 },
            { id: 4, name: "Red Cat", price: 800 }
          ]
        }
    });
</script>
   
</body>
</html>