<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de aulas</title>

    <!-- Adicionando Bootstrap CSS para uma estética agradável -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        /* Estilo personalizado para destacar o dia atual */
        .current-day {
            background-color: orange;
            color: white;
        }

        /* Efeito laranja ao passar o mouse sobre os dias */
        td:hover {
            background-color: orange;
            color: white;
        }

        /* Cor personalizada para o dia atual */
        .today {
            background-color: #FF4500; /* Laranja escuro */
            color: white;
        }

        /* Cor personalizada para feriados */
        .holiday {
            background-color: red;
            color: white;
        }

        /* Estilo para a lista de feriados na parte inferior */
        #holiday-info {
            margin-top: 20px;
        }

        /* Espaçamento para os botões Adicionar e Excluir Feriado */
        #add-holiday-btn,
        #delete-holiday-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Calendário Seidmann Institute</h2>

        <!-- Navegação do Calendário -->
        <div class="text-center mb-3">
            <button class="btn btn-warning" onclick="prevMonth()">‹ Mês Anterior</button>
            <span id="currentMonth" class="h4 mx-4"></span>
            <button class="btn btn-warning" onclick="nextMonth()">Próximo Mês ›</button>
        </div>

        <!-- Calendário -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Dom</th>
                            <th class="text-center">Seg</th>
                            <th class="text-center">Ter</th>
                            <th class="text-center">Qua</th>
                            <th class="text-center">Qui</th>
                            <th class="text-center">Sex</th>
                            <th class="text-center">Sáb</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body">
                        <!-- Conteúdo do Calendário será inserido aqui dinamicamente -->
                    </tbody>
                </table>
                <div id="holiday-info" class="text-center"></div>
            </div>
        </div>

        <!-- Botões Adicionar e Excluir Feriado -->
        <div class="text-center">
            <button class="btn btn-danger" id="add-holiday-btn" onclick="addHoliday()">Adicionar Feriado</button>
            <button class="btn btn-danger" id="delete-holiday-btn" onclick="deleteHolidayPrompt()">Excluir Feriado</button>
        </div>
    </div>

    <!-- Adicionando Bootstrap JS e Popper.js para funcionalidades avançadas -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Seu JavaScript personalizado -->
    <script>
        let currentYear, currentMonth;

        // Lista de feriados (exemplo estático)
        const holidays = [
            { day: 1, month: 1, name: 'Ano Novo' },
            { day: 21, month: 4, name: 'Tiradentes' },
            { day: 7, month: 9, name: 'Independência do Brasil' },
            { day: 12, month: 10, name: 'Nossa Senhora Aparecida' },
            { day: 2, month: 11, name: 'Finados' },
            { day: 15, month: 11, name: 'Proclamação da República' },
            { day: 25, month: 12, name: 'Natal' }
            // Adicione mais feriados conforme necessário
        ];

        // Funções para navegar entre os meses
        function nextMonth() {
            currentMonth++;
            if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
            updateCalendar();
        }

        function prevMonth() {
            currentMonth--;
            if (currentMonth < 1) {
                currentMonth = 12;
                currentYear--;
            }
            updateCalendar();
        }

        // Função para criar o calendário
        function createCalendar(year, month) {
            const firstDay = new Date(year, month - 1, 1);
            const lastDay = new Date(year, month, 0);
            const startingDay = firstDay.getDay();
            const totalDays = lastDay.getDate();

            const calendarBody = document.getElementById('calendar-body');
            calendarBody.innerHTML = '';

            let currentRow = document.createElement('tr');

            // Adiciona dias em branco até o início do mês
            for (let i = 0; i < startingDay; i++) {
                const emptyCell = document.createElement('td');
                emptyCell.textContent = '';
                currentRow.appendChild(emptyCell);
            }

            // Adiciona os dias do mês
            for (let day = 1; day <= totalDays; day++) {
                const currentCell = document.createElement('td');
                currentCell.textContent = day;
                currentCell.addEventListener('mouseover', () => displayHolidays(day, month));
                currentCell.addEventListener('mouseout', () => hideHolidays());
                currentRow.appendChild(currentCell);

                // Marca o dia atual
                if (day === new Date().getDate() && year === new Date().getFullYear() && month === new Date().getMonth() + 1) {
                    currentCell.classList.add('today');
                }

                // Marca os feriados
                if (isHoliday(day, month)) {
                    currentCell.classList.add('holiday');
                }

                // Avança para a próxima linha após adicionar o último dia da semana
                if ((startingDay + day - 1) % 7 === 6 || day === totalDays) {
                    calendarBody.appendChild(currentRow);
                    currentRow = document.createElement('tr');
                }
            }
        }

        // Função para verificar se um dia é feriado
        function isHoliday(day, month) {
            return holidays.some(holiday => holiday.day === day && holiday.month === month);
        }

        // Função para exibir os feriados na parte inferior do calendário
        function displayHolidays(day, month) {
            const holidayInfo = document.getElementById('holiday-info');
            const holidayNames = getHolidayNames(day, month);

            if (holidayNames.length > 0) {
                holidayInfo.textContent = `Feriados: ${holidayNames.join(', ')}`;
            } else {
                holidayInfo.textContent = '';
            }
        }

        // Função para obter os nomes dos feriados
        function getHolidayNames(day, month) {
            return holidays.filter(holiday => holiday.day === day && holiday.month === month).map(holiday => holiday.name);
        }

        // Função para ocultar os feriados quando o mouse sai do dia
        function hideHolidays() {
            const holidayInfo = document.getElementById('holiday-info');
            holidayInfo.textContent = '';
        }

        // Função para atualizar o calendário com base no ano e mês atuais
        function updateCalendar() {
            const calendarMonth = document.getElementById('currentMonth');
            calendarMonth.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
            createCalendar(currentYear, currentMonth);
        }

        // Função auxiliar para obter o nome do mês com base no índice
        function getMonthName(monthIndex) {
            const monthNames = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            return monthNames[monthIndex - 1];
        }

        // Chame markCurrentDay() para marcar o dia atual
        function markCurrentDay() {
            const today = new Date();
            currentYear = today.getFullYear();
            currentMonth = today.getMonth() + 1;
            updateCalendar();
        }

        // Função para adicionar feriado
        function addHoliday() {
            const holidayName = prompt('Nome do feriado:');
            const startDayMonth = prompt('Dia e mês de início (no formato DD-MM):');
            const endDayMonth = prompt('Dia e mês de término (no formato DD-MM):');

            if (holidayName && startDayMonth && endDayMonth) {
                const [startDay, startMonth] = startDayMonth.split('-').map(item => parseInt(item));
                const [endDay, endMonth] = endDayMonth.split('-').map(item => parseInt(item));

                if (!isNaN(startDay) && !isNaN(startMonth) && !isNaN(endDay) && !isNaN(endMonth) &&
                    startDay > 0 && startMonth > 0 && endDay > 0 && endMonth > 0) {

                    // Adiciona os dias do intervalo como feriados
                    for (let day = startDay; day <= endDay; day++) {
                        holidays.push({ day, month: startMonth, name: holidayName });
                    }

                    // Atualiza o calendário
                    updateCalendar();
                } else {
                    alert('Por favor, insira datas válidas.');
                }
            } else {
                alert('Por favor, preencha todos os campos.');
            }
        }

        // Função para excluir feriado com confirmação do nome
        function deleteHoliday(name) {
    // Encontrar o ID do feriado com base no nome
    const holidayToDelete = holidays.find(holiday => holiday.name === name);

    if (!holidayToDelete) {
        alert(`Feriado "${name}" não encontrado para exclusão.`);
        return;
    }

    const confirmDeletion = confirm(`Tem certeza que deseja excluir o feriado "${name}"?`);

    if (confirmDeletion) {
        // Fazer uma solicitação AJAX para excluir o feriado no servidor
        const url = 'URL_DO_SEU_PHP_ENDPOINT';
        const options = {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: holidayToDelete.id }),
        };

        fetch(url, options)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(`Feriado "${name}" excluído com sucesso!`);
                    // Remover o feriado da lista local e atualizar o calendário
                    holidays = holidays.filter(holiday => holiday.name !== name);
                    updateCalendar();
                } else {
                    alert(`Erro ao excluir feriado: ${data.message}`);
                }
            })
            .catch(error => {
                alert(`Erro ao excluir feriado: ${error.message}`);
            });
    }
}

        // Função para excluir feriado
        function deleteHoliday(name) {
            // Implemente a lógica para excluir o feriado no banco de dados
            // Aqui você pode enviar uma solicitação para o servidor ou usar algum mecanismo de armazenamento local
            holidays = holidays.filter(holiday => holiday.name !== name);
            alert(`Feriado "${name}" excluído com sucesso!`);
            // Após excluir, atualize o calendário
            updateCalendar();
        }

        // Inicializar o calendário ao carregar a página
        markCurrentDay();
    </script>

</body>
</html>
