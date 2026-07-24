fetch("php/fetch-properties.php")
.then(response => response.json())
.then(data => {

    const container = document.getElementById("propertyContainer");

    data.forEach(property => {

        container.innerHTML += `
            <div class="col-lg-6 mb-4">
                <div class="card property-card border-0 shadow">

                    <img src="images/${property.image}"
                    class="card-img-top">

                    <div class="card-body">

                        <h5 class="fw-bold">${property.name}</h5>

                        <p class="text-muted">
                            <i class="bi bi-geo-alt-fill text-danger"></i>
                            ${property.location}
                        </p>

                        <h4 class="text-primary">
                            ₹${property.price}
                            <span class="fs-6 text-dark">/month</span>
                        </h4>

                        <p>
                            ⭐ ${property.rating}
                        </p>

                        <span class="badge bg-primary">
                            ${property.gender}
                        </span>

                    </div>

                </div>
            </div>
        `;

    });

});