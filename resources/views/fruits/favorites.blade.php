<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-primary mb-4">Fruit Nutrition Table</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-secondary">Name</th>
                        <th class="text-secondary">Family</th>
                        <th class="text-secondary">Carbohydrates</th>
                        <th class="text-secondary">Protein</th>
                        <th class="text-secondary">Fat</th>
                        <th class="text-secondary">Calories</th>
                        <th class="text-secondary">Sugar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fruits as $fruit)
                        <tr>
                            <td>{{ $fruit->name }}</td>
                            <td>{{ $fruit->family }}</td>
                            <td>{{ $fruit->carbohydrates }}</td>
                            <td>{{ $fruit->protein }}</td>
                            <td>{{ $fruit->fat }}</td>
                            <td>{{ $fruit->calories }}</td>
                            <td>{{ $fruit->sugar }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                <h3 class="text-primary mb-3">Total Nutrition</h3>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Carbohydrates
                        <span class="badge bg-primary rounded-pill">{{ $total_nutrition['carbohydrates'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Protein
                        <span class="badge bg-primary rounded-pill">{{ $total_nutrition['protein'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Fat
                        <span class="badge bg-primary rounded-pill">{{ $total_nutrition['fat'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Calories
                        <span class="badge bg-primary rounded-pill">{{ $total_nutrition['calories'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Sugar
                        <span class="badge bg-primary rounded-pill">{{ $total_nutrition['sugar'] }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>