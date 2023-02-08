<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>Pupuk Petani</title>
</head>
<body>
  <header class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Pupuk Petani</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/pupukpetani">Home</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#">Library</a>
          </li>-->
          <!--<li class="nav-item">
            <a class="nav-link" href="/community">Create New</a>
          </li>-->
          <li class="nav-item">
            <div id="navbarNavDarkDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <button class="btn btn-link nav-link dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end">
                    <li>
                      <button class="dropdown-item d-flex align-items-center" href="#light" type="button"
                        data-bs-theme-value="light">
                        <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i> Light
                        <svg class="bi ms-auto d-none"><use href="#check2"></use></svg>
                      </button>
                    </li>
                    <li>
                      <button class="dropdown-item d-flex align-items-center" href="#dark" type="button"
                        data-bs-theme-value="dark">
                        <i class="bi bi-moon-fill me-2 opacity-50" data-theme-icon="bi-moon-fill"></i> Dark
                        <svg class="bi ms-auto d-none"><use href="#check2"></use></svg>
                      </button>
                    </li>
                    <li>
                      <button class="dropdown-item d-flex align-items-center" href="#auto" type="button"
                        data-bs-theme-value="auto">
                        <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi-circle-half"></i> Auto
                        <svg class="bi ms-auto d-none"><use href="#check2"></use></svg>
                      </button>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <br>
  <br>
  <br>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4>Create Data Pupuk Petani</h4>
      </div>
      <div class="card-body">
        <form action="proses_input.php" method="post">
          <table class="table">
            <tr>
              <td>ID Pupuk</td>
              <td><input class="form-control" type="text" name="id_pupuk" placeholder="Masukkan Id Pupuk"></td>
            </tr>
            <tr>
              <td>Nama Pupuk</td>
              <td><input class="form-control" type="text" name="nama_pupuk" placeholder="Masukkan Nama Pupuk"></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input class="form-control" type="text" name="harga" placeholder="Masukkan Harga Pupuk"></td>
            </tr>
            <tr>
              <td></td>
              <td><input class="btn btn-success" type="submit" value="Submit"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <!--Darkmode-->
  <script>
    (() => {
      'use strict'

      const storedTheme = localStorage.getItem('theme')

      const getPreferredTheme = () => {
        if (storedTheme) {
          return storedTheme
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
      }

      const setTheme = function (theme) {
        if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.setAttribute('data-bs-theme', 'dark')
        } else {
          document.documentElement.setAttribute('data-bs-theme', theme)
        }
      }

      setTheme(getPreferredTheme())

      const showActiveTheme = theme => {
        const activeThemeIcon = document.querySelector('.theme-icon-active')
        const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
        const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon

        document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
          element.classList.remove('active')
        })

        btnToActive.classList.add('active')
        activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive)
        activeThemeIcon.classList.add(iconOfActiveBtn)
        activeThemeIcon.dataset.iconActive = iconOfActiveBtn
      }

      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (storedTheme !== 'light' || storedTheme !== 'dark') {
          setTheme(getPreferredTheme())
        }
      })

      window.addEventListener('DOMContentLoaded', () => {
        showActiveTheme(getPreferredTheme())

        document.querySelectorAll('[data-bs-theme-value]')
          .forEach(toggle => {
            toggle.addEventListener('click', () => {
              const theme = toggle.getAttribute('data-bs-theme-value')
              localStorage.setItem('theme', theme)
              setTheme(theme)
              showActiveTheme(theme)
            })
          })
      })
    })()
  </script>
</body>
</html>