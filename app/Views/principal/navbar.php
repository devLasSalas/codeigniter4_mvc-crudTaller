<nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900  w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="container flex flex-wrap items-center mx-auto justify-center">

      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="<?php echo base_url('/principal')?>" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Inicio</a>
          </li>
          <li>
          <button id="dropdownNavbarLink" 
          data-dropdown-toggle="ubicaciones" 
          class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 
          rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto 
          dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 
          dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
            Ubicación 
          <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="ubicaciones" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="<?php echo base_url('/paises')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paises</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('/departamentos')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Departamentos</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('/municipios')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Municipios</a>
                  </li>
                </ul>
            </div>
          </li>
          <li>
            <a href="<?php echo base_url('/cargos')?>" 
            class="block py-2 pl-3 pr-4 text-gray-700 
            rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white 
            dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Cargos
            </a>
          </li>
          <li>
          <button id="dropdownNavbarLink" 
          data-dropdown-toggle="administrar" 
          class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 
          rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto 
          dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 
          dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
            Administrar 
          <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="administrar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="<?php echo base_url('/empleados')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Empleados</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('/salarios')?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Salarios</a>
                  </li>
                </ul>
            </div>
          </li>
        </ul>
      </div>
      
      
    </div>
</nav>