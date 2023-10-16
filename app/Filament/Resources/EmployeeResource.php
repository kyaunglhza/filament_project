<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use App\Models\NationalCard;
use Doctrine\DBAL\Schema\Schema;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Candidate Info')
                        ->schema([
                            TextInput::make('name_en')->label('Employee Name')->columnSpan(2),
                            TextInput::make('name_mm')->columnSpan(2),
                            TextInput::make('father_name')->columnSpan(2),
                            DatePicker::make('date_of_birth')->format('Y/m/d')->columnSpan(2),
                            Select::make('race_id')
                                ->label('Race')
                                ->relationship('races', 'name')
                            // ->searchable()
                            // ->required()
                                ->columnSpan(2),
                            Select::make('religion_id')
                                ->label('Religion')
                                ->relationship('religion', 'name')
                            // ->searchable()
                            // ->required()
                                ->columnSpan(2),
                            Select::make('nationality_id')
                                ->label('Nationality')
                                ->relationship('nationality', 'name')
                            // ->searchable()
                            // ->required()
                                ->columnSpan(2),
                            Select::make('vacancy_id')
                                ->label('Vacancy')
                                ->relationship('vacancy', 'name')
                            // ->searchable()
                            // ->required()
                                ->columnSpan(2),
                            TextInput::make('passport')->columnSpan(2),
                            TextInput::make('driver_license')->columnSpan(2),
                            Fieldset::make('employees')
                                ->schema([

                                    // Select::make('nrc_id')
                                    //     ->label('12/')
                                    //     ->relationship('nrc', 'nrc_code')
                                    //     ->searchable()
                                    //     ->required(),

                                    Select::make('national_card_id')
                                        ->label('12/')
                                        ->hiddenLabel()
                                        ->placeholder('12')->live(onBlur: true)
                                        ->options(NationalCard::select('nrc_code')->distinct()->pluck('nrc_code')),
                                    // ->searchable(),

                                    Select::make('national_card_id')
                                        ->hiddenLabel()
                                        ->placeholder('KaTaTa')->live(onBlur: true)
                                        ->relationship('nrc', 'name_en'),
                                    // ->searchable()
                                    // ->required(),

                                    Select::make('categories_id')
                                        ->hiddenLabel()
                                        ->placeholder('N')->live(onBlur: true)
                                        ->relationship('categories', 'name'),
                                    // ->searchable()
                                    // ->required(),

                                    TextInput::make('nrc_number')
                                        ->hiddenLabel(),
                                ])
                                ->columns(4)->columnSpan(2),
                            Select::make('gender_id')
                                ->label('Gender')
                                ->relationship('gender', 'name')
                            // ->searchable()
                            // ->required()
                                ->columnSpan(2),
                            Select::make('blood_type_id')
                                ->label('Blood Type')
                                ->relationship('blood_type', 'name')
                            // ->searchable()
                            // ->required()
                                ->columnSpan(2),
                            Select::make('marital_status')
                                ->label('Marital Status')
                                ->relationship('marital_status', 'name')
                            // ->searchable()
                            // ->required()
                                ->columnSpan(2),
                            TextInput::make('home_phone')->columnSpan(2),
                            TextInput::make('mobile_phone')->columnSpan(2),
                            TextInput::make('social_media')->columnSpan(2),
                            FileUpload::make('attachment')->columnSpan(2),
                        ])->columns(6),
                    Wizard\Step::make('Background Info')
                        ->schema([
                            // Checkbox::make('Education Info')->columnSpanFull()->default(true),

                            Fieldset::make('employees')
                                ->schema([
                                    TextInput::make('edu_degree')
                                    // ->required()
                                        ->live(onBlur: true),
                                    DatePicker::make('edu_from')->format('Y/m/d'),
                                    DatePicker::make('edu_to')->format('Y/m/d'),
                                    TextInput::make('edu_university')
                                    // ->required()
                                        ->live(onBlur: true),
                                ])->columns(4),

                            // Repeater::make('education')
                            //     ->schema([
                            //         TextInput::make('degree')
                            //         // ->required()
                            //             ->live(onBlur: true)
                            //             ->columnSpan(2),
                            //         DatePicker::make('from')->nullable(),
                            //         DatePicker::make('to')->nullable(),
                            //         TextInput::make('university')
                            //         // ->required()
                            //             ->live(onBlur: true)
                            //             ->columnSpan(2),

                            //     ])
                            //     ->columns(6)
                            //     ->itemLabel(fn(array $state): ?string => $state['name'] ?? null),

                            // Checkbox::make('Working Experience')->columnSpanFull()->default(true),

                            Fieldset::make('employees')
                                ->schema([
                                    TextInput::make('exp_job_title')
                                    // ->required()
                                        ->columnSpan(2)
                                        ->live(onBlur: true),
                                    TextInput::make('exp_company_name')
                                    // ->required()
                                        ->columnSpan(2)
                                        ->live(onBlur: true),
                                    DatePicker::make('exp_from')->format('Y/m/d'),
                                    DatePicker::make('exp_to')->format('Y/m/d'),
                                    TextInput::make('exp_employer_contact')
                                    // ->required()
                                        ->columnSpan(2)
                                        ->live(onBlur: true),
                                    TextInput::make('exp_employer_address')
                                    // ->required()
                                        ->live(onBlur: true)
                                        ->columnSpan(4),
                                ])->columns(6),

                            // Repeater::make('Work Experience')
                            //     ->schema([
                            //         TextInput::make('Job Title')
                            //         // ->required()
                            //             ->live(onBlur: true)
                            //             ->columnSpan(2),
                            //         TextInput::make('Company Name')
                            //         // ->required()
                            //             ->live(onBlur: true)
                            //             ->columnSpan(2),
                            //         DatePicker::make('From')->nullable(),
                            //         DatePicker::make('To')->nullable(),
                            //         TextInput::make('Employer Contact')
                            //         // ->required()
                            //             ->live(onBlur: true)
                            //             ->columnSpan(2),
                            //         TextInput::make('Employer Address')
                            //         // ->required()
                            //             ->live(onBlur: true)
                            //             ->columnSpan(4),
                            //         FileUpload::make('Select an Attachment')->columnSpan(4),

                            //     ])
                            //     ->columns(6)
                            //     ->itemLabel(fn(array $state): ?string => $state['name'] ?? null),

                            // Checkbox::make('Reference Person')->columnSpanFull()->default(true),
                            Fieldset::make('employees')
                                ->schema([
                                    TextInput::make('ref_person_name')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('ref_position')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('ref_email')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('ref_phone')
                                    // ->required()
                                        ->live(onBlur: true),
                                ])->columns(4),

                            // Checkbox::make('Family Members')->columnSpanFull()->default(true),

                            Fieldset::make('employees')
                                ->schema([
                                    TextInput::make('fam_member_name')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('fam_relationship')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('fam_date_of_birth')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('fam_occupation')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('fam_contact_phone')
                                    // ->required()
                                        ->live(onBlur: true),
                                    TextInput::make('fam_contact_address')
                                    // ->required()
                                        ->columnSpan(3)
                                        ->live(onBlur: true),
                                ])->columns(4),
                            // Repeater::make('Family')
                            //     ->schema([
                            //         TextInput::make('Family Member Name')
                            //         // ->required()
                            //             ->live(onBlur: true),
                            //         TextInput::make('Relationship')
                            //         // ->required()
                            //             ->live(onBlur: true),
                            //         DatePicker::make('Date of Birth')->nullable()->format('Y/m/d'),
                            //         TextInput::make('Occupation')
                            //         // ->required()
                            //             ->live(onBlur: true),
                            //         TextInput::make('Contact Phone Number')
                            //         // ->required()
                            //             ->live(onBlur: true),
                            //         TextInput::make('Contact Address')
                            //         // ->required()
                            //             ->live(onBlur: true)
                            //             ->columnSpan(3),

                            //     ])
                            //     ->columns(4)
                            //     ->itemLabel(fn(array $state): ?string => $state['name'] ?? null),

                        ]),

                    Wizard\Step::make('Address')
                        ->schema([
                            // Checkbox::make('Addresses')->columnSpanFull()->default(true),

                            Fieldset::make('employees')
                                ->schema([
                                    Select::make('country')
                                        ->options([
                                            'draft' => 'Draft',
                                            'reviewing' => 'Reviewing',
                                            'published' => 'Published',
                                        ]),
                                    Select::make('state')
                                        ->options([
                                            'draft' => 'Draft',
                                            'reviewing' => 'Reviewing',
                                            'published' => 'Published',
                                        ]),
                                    Select::make('township')
                                        ->options([
                                            'draft' => 'Draft',
                                            'reviewing' => 'Reviewing',
                                            'published' => 'Published',
                                        ]),
                                    Select::make('street')
                                        ->options([
                                            'draft' => 'Draft',
                                            'reviewing' => 'Reviewing',
                                            'published' => 'Published',
                                        ]),
                                    // ->required()
                                ])->columns(4),

                            // Repeater::make('Address')
                            //     ->schema([
                            //         // TextInput::make('country')
                            //         // // ->required()
                            //         //     ->live(onBlur: true),
                            //         // TextInput::make('state')
                            //         // // ->required()
                            //         //     ->live(onBlur: true),
                            //         // TextInput::make('township')
                            //         // // ->required()
                            //         //     ->live(onBlur: true),
                            //         // TextInput::make('street')
                            //         // // ->required()
                            //         //     ->live(onBlur: true),

                            //         Select::make('country')
                            //             ->options([
                            //                 'draft' => 'Draft',
                            //                 'reviewing' => 'Reviewing',
                            //                 'published' => 'Published',
                            //             ]),

                            //         Select::make('state')
                            //             ->options([
                            //                 'draft' => 'Draft',
                            //                 'reviewing' => 'Reviewing',
                            //                 'published' => 'Published',
                            //             ]),

                            //         Select::make('township')
                            //             ->options([
                            //                 'draft' => 'Draft',
                            //                 'reviewing' => 'Reviewing',
                            //                 'published' => 'Published',
                            //             ]),

                            //         Select::make('street')
                            //             ->options([
                            //                 'draft' => 'Draft',
                            //                 'reviewing' => 'Reviewing',
                            //                 'published' => 'Published',
                            //             ]),

                            //     ])
                            //     ->columns(4)
                            //     ->itemLabel(fn(array $state): ?string => $state['name'] ?? null),
                        ]),
                ])->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth'),
                TextColumn::make('mobile_phone'),
                Tables\Columns\TextColumn::make('gender.name'),
                Tables\Columns\TextColumn::make('religion.name'),
                Tables\Columns\TextColumn::make('vacancy.name'),
                TextColumn::make('edu_degree')
                    ->toggleable(),
                TextColumn::make('edu_university')
                    ->toggleable(),
                TextColumn::make('exp_job_title')
                    ->toggleable(),
                TextColumn::make('exp_company_name')
                    ->toggleable(),
                TextColumn::make('ref_person_name')
                    ->toggleable(),
                TextColumn::make('ref_phone')
                    ->toggleable(),
                TextColumn::make('fam_member_name')
                    ->toggleable(),
                TextColumn::make('fam_contact_phone')
                    ->toggleable(),
                TextColumn::make('township')
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
