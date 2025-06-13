/* eslint-disable prettier/prettier */
import { IsEmail, IsNotEmpty, MinLength } from 'class-validator';
// import { Column } from 'typeorm';

export class CreateUserDto {
  // @IsString({ message: 'ឈ្មោះត្រូវតែជាអក្សរ' })
  // @MinLength(3, { message: 'ឈ្មោះត្រូវតែមានយ៉ាងហោចណាស់ 3 អក្សរ' })
  // @Matches(/^[a-zA-Z0-9]+$/, { message: 'ឈ្មោះត្រូវតែមានតែអក្សរ និងលេខ' })
  @IsNotEmpty()
  username: string;

  // dara@itc.edu.kh
  // @Matches(/^[\w.-]+@[\w.-]+\.edu\.kh$/, { message: 'អុីម៉ែលមិនត្រឹមត្រូវ' })
  @IsEmail()
  // @Column({ unique: true })
  email: string;

  // @IsString({ message: 'លេខសំងាត់ត្រូវតែជាអក្សរ' })
  // @Matches(/^(?=.*[*&+@!$%]).{6,10}$/, {
  //   message:
  //     'លេខសំងាត់ត្រូវតែមានយ៉ាងហោចណាស់ 6 អក្សរ និងមានអក្សរធំ អក្សរតូច លេខ និងសញ្ញាពិសេស',
  // })
  @MinLength(3)
  password: string;
}
