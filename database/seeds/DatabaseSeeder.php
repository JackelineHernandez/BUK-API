<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryCatalogueTableSeeder::class);
        $this->call(EstablishmentTypeCatalogueTableSeeder::class);
        $this->call(HotelServiceTableSeeder::class);
        $this->call(PhoneHotelsTableSeeder::class);
        $this->call(CustomerTypeCatalogueTableSeeder::class);
        $this->call(HotelServiceCustomerTypeCatalogueTableSeeder::class);
        $this->call(InternetConnectTypeCatalogueTableSeeder::class);
        $this->call(InternetPlaceCatalogueTableSeeder::class);
        $this->call(DescriptiongenHotelTableSeeder::class);
        $this->call(FacilityCatalogueTableSeeder::class);
        $this->call(DescriptiongenHotelFacilityCatalogueTableSeeder::class);
        $this->call(BreakfastCatalogueTableSeeder::class);
        $this->call(DescriptiongenHotelBreakfastCatalogueTableSeeder::class);
        $this->call(LangCatalogueTableSeeder::class);
        $this->call(DescriptiongenHotelLangCatalogueTableSeeder::class);
        $this->call(RoomTypeCatalogueTableSeeder::class);
        $this->call(ItemMeasureCatalogueTableSeeder::class);
        $this->call(RoomNamesCatalogueTableSeeder::class);
        $this->call(RoomPriceLayoutsTableSeeder::class);
        $this->call(RoomPriceLayoutsItemMeasureCatalogueTableSeeder::class);
        $this->call(HotelServiceRatingTableSeeder::class);
        $this->call(AmenitiesTypeTableSeeder::class);
        $this->call(AmenitiesCatalogueTableSeeder::class);
        $this->call(AmenitiesHotelTableSeeder::class);
        $this->call(AmenitiesHotelAmenitiesCatalogueTableSeeder::class);
        $this->call(AmenityExtraBedsTableSeeder::class);
        $this->call(VehiclesCategoryCatalogueTableSeeder::class);
        $this->call(VehiclesTypeCatalogueTableSeeder::class);
        $this->call(TransferServiceTableSeeder::class);
        $this->call(PhoneTransferTableSeeder::class);
        $this->call(VehiclesFeaturesTableSeeder::class);
        $this->call(VehiclesAvailabilityTableSeeder::class);
        $this->call(ExtraChargesCatalogueTableSeeder::class);
        $this->call(VehiclesExtraChargesTableSeeder::class);
        $this->call(VehiclesPoliciesTableSeeder::class);
        $this->call(PaymentCatalogueTableSeeder::class);
        $this->call(PayCardsCatalogueTableSeeder::class);
    }
}
